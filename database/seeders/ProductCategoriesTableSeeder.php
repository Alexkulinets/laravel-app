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
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        // Для категорії 3
        for ($i = 1; $i <= 12; $i++) {
            $data[] = [
                'category_id' => 3,
                'product_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        for ($i = 13; $i <= 13; $i++) {
            $data[] = [
                'category_id' => 4,
                'product_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        for ($i = 14; $i <= 15; $i++) { 
            $data[] = [
                'category_id' => 5,
                'product_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        for ($i = 14; $i <= 15; $i++) { 
            $data[] = [
                'category_id' => 7,
                'product_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        
        // Вставка даних в таблицю
        DB::table('product_categories')->insert($data);
    }
}
