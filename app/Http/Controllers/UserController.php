<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Ambil semua user
    public function index()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "No users found!"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get All Users',
            'data' => $users
        ], 200);
    }
}
