<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-001',
            'customer_id' => 1,
            'book_id' => 3,
            'total_amount' => 250000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-002',
            'customer_id' => 2,
            'book_id' => 7,
            'total_amount' => 150000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-003',
            'customer_id' => 2,
            'book_id' => 2,
            'total_amount' => 200000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-004',
            'customer_id' => 1,
            'book_id' => 5,
            'total_amount' => 300000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-005',
            'customer_id' => 2,
            'book_id' => 1,
            'total_amount' => 120000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-006',
            'customer_id' => 2,
            'book_id' => 10,
            'total_amount' => 450000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-007',
            'customer_id' => 1,
            'book_id' => 6,
            'total_amount' => 220000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-008',
            'customer_id' => 2,
            'book_id' => 8,
            'total_amount' => 180000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-009',
            'customer_id' => 1,
            'book_id' => 4,
            'total_amount' => 275000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-010',
            'customer_id' => 1,
            'book_id' => 9,
            'total_amount' => 320000.00
        ]);
    }
}
