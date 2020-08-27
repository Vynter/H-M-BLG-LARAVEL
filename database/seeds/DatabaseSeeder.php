<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(users::class); // il va exécuté la class users quand j'exécute la commande php artisan db:seed
        $this->call(articles::class);
    }
}