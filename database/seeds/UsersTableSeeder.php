<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = (int)$this->command->ask('How many users do you need ?', 10);
        $this->command->info("Creating {$userCount} users.");
        factory(App\User::class, $userCount)->create();
        $this->command->info('Users Created!');
    }
}
