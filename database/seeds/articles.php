<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class articles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Factory::create('fr_FR');

        $data = [];
        $users = User::pluck('id')->toArray(); // récupéré tt les id qui se trouve dans user

        //DB::table('users')->truncate(); //c'est pour truncate la table

        for ($i = 1; $i <= 100; $i++) {
            array_push($data, [
                'name' => $faker->sentence,
                'body' => $faker->realText(2000),
                'published_at' => $faker->datetime(),
                'user_id' => $faker->randomElement($users)
            ]);
        }
        DB::table('articles')->insert($data);
    }
}