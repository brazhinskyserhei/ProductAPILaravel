<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCount = (int)$this->command->ask('How many products do you need ?', 10);
        $this->command->info("Creating {$productsCount} products.");
        factory(App\Product::class, $productsCount)->create();
        $this->command->info('Products Created!');
    }
}
