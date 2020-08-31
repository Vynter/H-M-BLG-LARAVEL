<?php

use App\Article;
use App\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class tags extends Seeder
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

        //DB::table('tags')->truncate(); //c'est pour truncate la table

        for ($i = 1; $i <= 30; $i++) {
            array_push($data, [
                'name' => $faker->unique()->word

            ]);
        }
        //DB::table('tags')->insert($data);
        Tag::insert($data);


        //////////////////table intermédiaire//////////////////

        $faker =  Factory::create('fr_FR');

        $data = [];
        $articles = Article::pluck('id')->toArray(); // récupéré tt les id qui se trouve dans user
        $tags = Tag::pluck('id')->toArray(); // récupéré tt les id qui se trouve dans user
        //DB::table('tags')->truncate(); //c'est pour truncate la table

        for ($i = 1; $i <= 100; $i++) {
            array_push($data, [
                'article_id' => $faker->randomElement($articles),
                'tag_id' => $faker->randomElement($tags)

            ]);
        }
        //DB::table('tags')->insert($data);
        DB::table('article_tag')->insert($data);
    }
}