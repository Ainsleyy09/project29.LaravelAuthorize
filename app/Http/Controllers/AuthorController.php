<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource Data Not Found!"
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resources",
            "data" => $authors
        ], 200);
    }

    public function show(string $id)
    {
        $authors = Author::find($id);

        if (!$authors) {
            return response()->json([
                'success' => false,
                'message' => "Resource Data Not Found!"
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail Books',
            'data' => $authors
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $image = $request->file('photo');
        $image->store('authors', 'public');

        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author added successfully!',
            'data' => $author
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $image->hashName();
        } 

        $author->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully!',
            'data' => $author
        ], 200);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found!'
            ], 404);
        }

        if ($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully!'
        ], 200);
    }
}
