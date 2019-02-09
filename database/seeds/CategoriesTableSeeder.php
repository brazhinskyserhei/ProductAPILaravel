<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesCount = (int)$this->command->ask('How many categories do you need ?', 10);
        $this->command->info("Creating {$categoriesCount} categories.");
        factory(App\Category::class, $categoriesCount)->create();
        $this->command->info('Categories Created!');
    }
}
