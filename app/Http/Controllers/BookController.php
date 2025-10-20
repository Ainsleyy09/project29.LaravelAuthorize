<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['genre', 'author'])->get();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource Data Not Found!"
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Books',
            'data' => $books
        ], 200);
    }

    public function show (string $id){
        $books = Book::find($id);

        if(!$books){
            return response()->json([
                'success' => false,
                'message' => "Resource Data Not Found!"
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Books',
            'data' => $books
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genre,id',
            'author_id' => 'required|exists:author,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book added successfully!',
            'data' => $book
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genre,id',
            'author_id' => 'required|exists:author,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ];

        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $image->store('books', 'public');

            if($book->cover_photo){
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        } 

        $book->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully!',
            'data' => $book
        ], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found!'
            ], 404);
        }

        if($book->cover_photo){
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully!'
        ], 200);
    }
}
