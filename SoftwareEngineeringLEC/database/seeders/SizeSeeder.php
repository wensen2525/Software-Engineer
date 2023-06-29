<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([[
            'name' => 'random',
        ],[
            'name' => 'XS',
        ],[
            'name' => 'S',
        ],[
            'name' => 'M',
        ],[
            'name' => 'L',
        ],[
            'name' => 'XL',
        ]]);
    }
}
