<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'photo' => 'https://awsimages.detik.net.id/community/media/visual/2020/06/11/jk-rowling-2_43.jpeg?w=1200',
            'bio' => 'Penulis Harry Potter.'
        ]);

        Author::create([
            'name' => 'George R.R. Martin',
            'photo' => 'https://cdn.britannica.com/05/223205-050-8931FF28/American-writer-George-RR-Martin-2011.jpg',
            'bio' => 'Penulis A Song of Ice and Fire.'
        ]);

        Author::create([
            'name' => 'Agatha Christie',
            'photo' => 'https://pagaralampos.disway.id/upload/2b4cf937ced7d0bfdd5bd353ce2536eb.jpg',
            'bio' => 'Ratu misteri, penulis Hercule Poirot.'
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/d/d4/J._R._R._Tolkien%2C_ca._1925.jpg',
            'bio' => 'Penulis Lord of The Rings dan The Hobbit.'
        ]);

        Author::create([
            'name' => 'Dan Brown',
            'photo' => 'https://i.guim.co.uk/img/media/adb81d8dde35e9acdbb37a6d39c2725ba01c5379/0_337_6720_4032/master/6720.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=93a776f8c1eee608c54084d20341c672',
            'bio' => 'Penulis The Da Vinci Code.'
        ]);

        Author::create([
            'name' => 'Ernest Hemingway',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Ernest_Hemingway_1923_passport_photo.jpg',
            'bio' => 'Penulis klasik Amerika terkenal dengan gaya minimalis.'
        ]);

        Author::create([
            'name' => 'Leo Tolstoy',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Ilya_Efimovich_Repin_%281844-1930%29_-_Portrait_of_Leo_Tolstoy_%281887%29.jpg',
            'bio' => 'Penulis klasik Rusia, terkenal dengan War and Peace.'
        ]);

        Author::create([
            'name' => 'Haruki Murakami',
            'photo' => 'https://static01.nyt.com/images/2011/10/23/magazine/23murakami1_span/23murakami1_span-articleLarge.jpg?quality=75&auto=webp&disable=upscale',
            'bio' => 'Penulis Jepang, terkenal dengan novel surreal.'
        ]);

        Author::create([
            'name' => 'Stephen King',
            'photo' => 'https://www.rollingstone.com/wp-content/uploads/2023/09/stephen-king-intvw.jpg?w=1581&h=1054&crop=1',
            'bio' => 'Raja horor modern.'
        ]);

        Author::create([
            'name' => 'Mark Twain',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/0/0c/Mark_Twain_by_AF_Bradley.jpg',
            'bio' => 'Penulis klasik Amerika, terkenal dengan The Adventures of Tom Sawyer.'
        ]);
    }
}
