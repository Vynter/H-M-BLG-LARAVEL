<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        //return DB::table('articles')->get();  une des solutions
        //$articles =  Article::all(); // affiche tout
        $articles = Article::paginate(20); // c'est pour la pagination
        //$lastArticles = Article::orderBy('published_at', 'DESC')->take(10)->get();
        //same as above take the last 10 articles
        $lastArticles = Article::orderBy('published_at')->paginate(10);




        return view('articles.index', compact('articles', 'lastArticles'));

        //return view('articles.index', ['articles' => $articles]);
        /*technique d'envoi avec variable**
        *return view('articles.index', compact('articles', 'users'...etc))
        *return view('articles.index')->with('articles' , $articles)
        *return view('articles.index')->withArticles($articles)
        */
    }
    public function show($id)
    {
        $article = Article::findorfail($id);
        return view('articles.show', compact('article'));
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