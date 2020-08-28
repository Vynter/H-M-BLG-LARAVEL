<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        //return DB::table('articles')->get();
        return Article::all();
    }
    public function store()
    {
        /*DB::table('articles')->insert([
            'name' => 'random',
            'body' => 'randombody',
            'published_at' => '2020/02/02 00:00:01'
        ]);*/
        Article::insert([
            'name' => 'random',
            'body' => 'randombody',
            'published_at' => '2020/02/02 00:00:01'
        ]);
    }
    public function update()
    {
        /*DB::table('articles')->where('id', 101)->update([
            'name' => 'randomUPDATED',
            'body' => 'randombodyUPDATED',
            'published_at' => '2020/10/10 00:00:01'
        ]);*/
        Article::where('id', 103)->update([
            'name' => 'randomUPDATED',
            'body' => 'randombodyUPDATED',
            'published_at' => '2020/10/10 00:00:01'
        ]);
    }

    public function destroy()
    {
        Article::where('id', 103)->delete();
        //  Article::destroy(103);
        //DB::table('articles')->where('id', 102)->delete();
    }
}
