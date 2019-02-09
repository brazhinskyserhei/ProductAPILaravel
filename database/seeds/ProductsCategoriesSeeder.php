<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $productIds = DB::table('products')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        foreach ((range(1, 30)) as $index)
        {
            DB::table('category_product')->insert(
                [
                    'product_id' => $productIds[array_rand($productIds)],
                    'category_id' => $categoryIds[array_rand($categoryIds)]
                ]
            );
        }

    }
}
