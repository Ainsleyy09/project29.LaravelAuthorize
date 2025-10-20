<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $fillable = ['title', 'description', 'price', 'stock', 'cover_photo', 'genre_id', 'author_id'];

    public function genre() {
        return $this->belongsTo(\App\Models\Genre::class);
    }
    
    public function author() {
        return $this->belongsTo(\App\Models\Author::class);
    }
    
}


