<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_deliveries')->insert([
            [
                'name' => 'Regular',
            ],
            [
                'name' => 'Express',
            ],
            [
                'name' => 'Si Cepat',
            ],
            [
                'name' => 'JNE',
            ],
            [
                'name' => 'J&T',
            ]
        ]);
    }
}
