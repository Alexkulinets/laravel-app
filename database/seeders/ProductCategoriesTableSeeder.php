<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('product_categories')->truncate();

        $data = [];

        // Для категорії 2
        for ($i = 1; $i <= 13; $i++) {
            $data[] = [
                'category_id' => 2,
                'product_id' => $i,
            ];
        }
        
        // Для категорії 3
        for ($i = 1; $i <= 12; $i++) {
            $data[] = [
                'category_id' => 3,
                'product_id' => $i,
            ];
        }

        // Для категорії 4
        for ($i = 13; $i <= 13; $i++) {
            $data[] = [
                'category_id' => 4,
                'product_id' => $i,
            ];
        }

        // Для категорії 5
        for ($i = 14; $i <= 17; $i++) { 
            $data[] = [
                'category_id' => 5,
                'product_id' => $i,
            ];
        }

        // Для категорії 7
        for ($i = 14; $i <= 15; $i++) { 
            $data[] = [
                'category_id' => 7,
                'product_id' => $i,
            ];
        }
        
        // Для категорії 9
        for ($i = 16; $i <= 16; $i++) { 
            $data[] = [
                'category_id' => 9,
                'product_id' => $i,
            ];
        }

        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_categories')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
