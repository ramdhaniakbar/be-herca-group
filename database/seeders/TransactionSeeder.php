<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create sale seeder
        DB::table('transactions')->insert([
            [
                'marketing_id' => 1,
                'transaction_number' => 'TRX001',
                'date' => '2023-05-22',
                'cargo_fee' => 25000,
                'total_balance' => 3000000,
                'grand_total' => 3025000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 3,
                'transaction_number' => 'TRX002',
                'date' => '2023-05-22',
                'cargo_fee' => 25000,
                'total_balance' => 320000,
                'grand_total' => 345000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 1,
                'transaction_number' => 'TRX003',
                'date' => '2023-05-22',
                'cargo_fee' => 0,
                'total_balance' => 65000000,
                'grand_total' => 65000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 1,
                'transaction_number' => 'TRX004',
                'date' => '2023-05-23',
                'cargo_fee' => 10000,
                'total_balance' => 70000000,
                'grand_total' => 70010000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 2,
                'transaction_number' => 'TRX005',
                'date' => '2023-05-23',
                'cargo_fee' => 10000,
                'total_balance' => 80000000,
                'grand_total' => 80010000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 3,
                'transaction_number' => 'TRX006',
                'date' => '2023-05-23',
                'cargo_fee' => 12000,
                'total_balance' => 44000000,
                'grand_total' => 44012000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 1,
                'transaction_number' => 'TRX007',
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 75000000,
                'grand_total' => 75000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 2,
                'transaction_number' => 'TRX008',
                'date' => '2023-06-02',
                'cargo_fee' => 0,
                'total_balance' => 85000000,
                'grand_total' => 85000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 2,
                'transaction_number' => 'TRX009',
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 175000000,
                'grand_total' => 175000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 3,
                'transaction_number' => 'TRX010',
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 75000000,
                'grand_total' => 75000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 2,
                'transaction_number' => 'TRX011',
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 750020000,
                'grand_total' => 750020000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marketing_id' => 3,
                'transaction_number' => 'TRX012',
                'date' => '2023-06-01',
                'cargo_fee' => 0,
                'total_balance' => 130000000,
                'grand_total' => 120000000,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
