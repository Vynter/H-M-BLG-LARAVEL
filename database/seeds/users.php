<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class users extends Seeder
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

        //DB::table('users')->truncate(); //c'est pour truncate la table

        for ($i = 1; $i <= 10; $i++) {
            array_push($data, [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt(123456)
            ]);
        }
        DB::table('users')->insert($data);
    }
}