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

        // Масив категорій та відповідних продуктів
        $categories = [
            2 => array_merge(range(1, 13)), 
            3 => range(1, 12), 
            4 => [13],        
            5 => range(14, 17),
            7 => range(14, 15), 
            9 => [16],         
        ];

        $data = [];

        // Для кожної категорії додаємо відповідні продукти
        foreach ($categories as $categoryId => $productIds) {
            foreach ($productIds as $productId) {
                $data[] = [
                    'category_id' => $categoryId,
                    'product_id' => $productId,
                ];
            }
        }

        // Вставка даних у таблицю
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_categories')->insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
