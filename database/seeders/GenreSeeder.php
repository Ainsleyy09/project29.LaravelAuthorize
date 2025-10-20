<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre yang berisi elemen magis, dunia imajinatif, dan makhluk mistis.'
        ]);

        Genre::create([
            'name' => 'Adventure',
            'description' => 'Genre yang menampilkan perjalanan dan tantangan berbahaya.'
        ]);

        Genre::create([
            'name' => 'Classic',
            'description' => 'Karya sastra yang diakui secara luas dan abadi sepanjang masa.'
        ]);

        Genre::create([
            'name' => 'Dystopian',
            'description' => 'Genre yang menggambarkan masyarakat masa depan yang suram atau penuh penindasan.'
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'Berfokus pada pemecahan teka-teki, kejahatan, atau rahasia tersembunyi.'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang menyoroti hubungan percintaan antar tokoh.'
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'Berkaitan dengan teknologi canggih, luar angkasa, dan masa depan.'
        ]);

        Genre::create([
            'name' => 'Historical Fiction',
            'description' => 'Menggabungkan elemen fiksi dengan latar sejarah nyata.'
        ]);

        Genre::create([
            'name' => 'Children',
            'description' => 'Buku yang ditujukan untuk anak-anak dengan cerita edukatif dan imajinatif.'
        ]);

        Genre::create([
            'name' => 'Thriller',
            'description' => 'Genre penuh ketegangan, misteri, dan kejutan mendebarkan.'
        ]);
    }
}
