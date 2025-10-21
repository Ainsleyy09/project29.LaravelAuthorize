<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource Data Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Transactions',
            'data' => $transactions
        ], 200);
    }

    public function show(string $id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => "Resource Data Not Found!"
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Transaction',
            'data' => $transaction
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:book,id',
            'quantity' => 'required|integer|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $uniqueCode = "ORD" . strtoupper(uniqid());

        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $book = Book::find($request->book_id);

        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock!'
            ], 400);
        }

        $totalAmount = $book->price * $request->quantity;

        $book->stock -= $request->quantity;
        $book->save();

        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction added successfully!',
            'data' => $transaction
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'order_number' => 'required|string|max:50|unique:transactions,order_number,' . $id,
            'customer_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:book,id',
            'total_amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $transaction->update([
            'order_number' => $request->order_number,
            'customer_id' => $request->customer_id,
            'book_id' => $request->book_id,
            'total_amount' => $request->total_amount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully!',
            'data' => $transaction
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        // Ambil buku terkait
        $book = Book::find($transaction->book_id);
        if ($book) {
            // Kembalikan stock sesuai quantity yang dibeli
            if (isset($transaction->quantity)) {
                $book->stock += $transaction->quantity;
            }
            $book->save();
        }

        // Hapus transaksi
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully and stock updated!'
        ], 200);
    }
}
