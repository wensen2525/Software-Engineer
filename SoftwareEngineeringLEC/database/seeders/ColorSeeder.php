<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([[
            'name' => 'gray',
            'colorHex' => '#6e6e6e'
        ],[
            'name' => 'purple_shock',
            'colorHex' => '#9747ff'
        ],[
            'name' => 'yellow_light',
            'colorHex' => '#fbbc05'
        ],[
            'name' => 'orange_light',
            'colorHex' => '#ff5607'
        ],[   
            'name' => 'orange_dark',
            'colorHex' => '#f6412d'
        ],[  
            'name' => 'pink',
            'colorHex' => '#d91b5c'
        ],[  
            'name' => 'blue_dark',
            'colorHex' => '#0f75bc'
        ],[  
            'name' => 'tosca',
            'colorHex' => '#13a89e'
        ],[      
            'name' => 'green_dark',
            'colorHex' => '#0b9444'
        ],[  
            'name' => 'green_light',
            'colorHex' => '#8cc63f'
        ],[  
            'name' => 'white',
            'colorHex' => '#ffffff'
        ],[  
            'name' => 'black',
            'colorHex' => '#000000' 
        ]]);
    }
}
