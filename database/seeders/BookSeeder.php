<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'Petualangan pertama Harry Potter di Hogwarts melawan kekuatan jahat Voldemort.',
            'price' => 120000,
            'stock' => 10,
            'cover_photo' => 'https://m.media-amazon.com/images/I/71XqqKTZz7L._UF1000,1000_QL80_.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'description' => 'Perjalanan Frodo dan sahabatnya menghancurkan cincin kekuasaan.',
            'price' => 150000,
            'stock' => 8,
            'cover_photo' => 'https://www.wtsbooks.com/cdn/shop/products/475e1d819a7509d6a890ec15c139b330.jpg?v=1680273779&width=1214',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Kisah Bilbo Baggins yang melakukan perjalanan epik bersama para dwarf.',
            'price' => 130000,
            'stock' => 12,
            'cover_photo' => 'https://mir-s3-cdn-cf.behance.net/project_modules/1400/7a612241550133.5606ffa0c18b0.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'description' => 'Novel klasik tentang keadilan sosial dan moral di Amerika Selatan.',
            'price' => 110000,
            'stock' => 7,
            'cover_photo' => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/To_Kill_a_Mockingbird_%28first_edition_cover%29.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => 'Dilan 1999',
            'description' => 'Kisah dystopian tentang pengawasan total dan hilangnya kebebasan.',
            'price' => 115000,
            'stock' => 6,
            'cover_photo' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg6Jx8mwpg4EvInQuy3R_Vn9KUym5Sy_-hNl3s-HVZai3gKWPGKSf-mcqoPG8UgUW7sbAUsPgEIu5j9WPX_pkJVU7OJc9lrd49vZ63QBJcEInh1RIYPHzmkndUASEi2Hd2n3RzxdXtFDoA/s1600/dilan.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => 'The Da Vinci Code',
            'description' => 'Thriller misteri tentang rahasia besar yang tersembunyi dalam karya seni Da Vinci.',
            'price' => 125000,
            'stock' => 9,
            'cover_photo' => 'https://m.media-amazon.com/images/I/71y4X5150dL.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);

        Book::create([
            'title' => 'Tinker Bell',
            'description' => 'Kisah cinta antara manusia dan vampir yang mengguncang dunia remaja.',
            'price' => 99000,
            'stock' => 15,
            'cover_photo' => 'https://m.media-amazon.com/images/I/81f+1+gP75L._UF1000,1000_QL80_.jpg',
            'genre_id' => 6,
            'author_id' => 6,
        ]);

        Book::create([
            'title' => 'The Hunger Games',
            'description' => 'Petualangan Katniss Everdeen dalam turnamen mematikan di dunia distopia.',
            'price' => 105000,
            'stock' => 11,
            'cover_photo' => 'https://m.media-amazon.com/images/I/71WSzS6zvCL._UF1000,1000_QL80_.jpg',
            'genre_id' => 7,
            'author_id' => 7,
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'description' => 'Kisah cinta klasik antara Elizabeth Bennet dan Mr. Darcy di abad ke-19.',
            'price' => 98000,
            'stock' => 13,
            'cover_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRU5AfrvhPMMEL7WHYy-I3HS9VOWRhhiT4McQ&s',
            'genre_id' => 8,
            'author_id' => 8,
        ]);

        Book::create([
            'title' => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
            'description' => 'Empat anak menemukan dunia ajaib Narnia dan bertemu singa Aslan.',
            'price' => 118000,
            'stock' => 10,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/Narnia_2_The_Lion_The_Witch_and_The_Wardrobe_cov_page-0001.jpg',
            'genre_id' => 9,
            'author_id' => 9,
        ]);
    }
}
