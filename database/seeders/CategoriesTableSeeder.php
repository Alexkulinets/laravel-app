<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        
        DB::table('categories')->insert([
            [
                'title' => 'All products',
                'parent_id' => null,
            ],
            [
                'title' => 'Phones',
                'parent_id' => null,
            ],
            [
                'title' => 'Iphone',
                'parent_id' => 2,
            ],
            [
                'title' => 'Google',
                'parent_id' => 2,
            ],
            [
                'title' => 'Laptops',
                'parent_id' => null,
            ],
            [
                'title' => 'MSI',
                'parent_id' => 5,
            ],
            [
                'title' => 'ASUS',
                'parent_id' => 5,
            ],
            [
                'title' => 'lenovo',
                'parent_id' => 5,
            ],
            [
                'title' => 'Samsung',
                'parent_id' => 5,
            ],

        ]); 
    }
}
