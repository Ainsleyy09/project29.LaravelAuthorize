<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2); 
            $table->integer('stock');
            $table->string('cover_photo');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('author')->onDelete('cascade');
            
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')->references('id')->on('genre')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
