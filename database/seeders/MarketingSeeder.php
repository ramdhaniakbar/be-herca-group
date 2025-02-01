<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create marketing seeder
        DB::table('marketings')->insert([
            [
                'name' => 'Alfandy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Danang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
