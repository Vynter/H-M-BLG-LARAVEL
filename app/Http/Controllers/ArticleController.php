<?php

namespace App\Http\Controllers;

use App\User;
use articles;
use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // si vous n'etes pas co ca vous renvoi a login
    }
    public function index()
    {
        /*$articles = Article::where('name', 'like', '%' . request('q') . '%')
            ->orWhere('body', 'like', '%' . request('q') . '%')
            ->paginate(20); */                             // Version normal
        $articles  = Article::recherche()->latest('id')->paginate(20); // Version en utilisant un scoop

        //$articles = Article::paginate(20); // c'est pour la pagination
        /**
         * return DB::table('articles')->get();  une des solutions
         * $articles =  Article::all(); // affiche tout
         * $lastArticles = Article::orderBy('published_at', 'DESC')->take(10)->get();
         * same as above take the last 10 articles// sauf qu'on a du changer le nom de la page en 'feuille'
         * pour ne pas avoir de conflie avec le paginate d'en haut
         * $lastArticles = Article::latest('published_at')->paginate(10, ['id', 'name'], 'feuille');*/


        return view('articles.index', compact('articles'/*, 'lastArticles'*/));

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
    public function create()
    {

        return view('articles.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:6',
            'body' => 'required|min:10',
            'published_at' => 'required|date'
        ]);
        /*DB::table('articles')->insert([
            'name' => 'random',
            'body' => 'randombody',
            'published_at' => '2020/02/02 00:00:01'
        ]);*/
        /*Article::insert([                 1er methode
            'name' => request('name'),
            'body' => request('body'),
            'user_id' => request('user_id'),
            'published_at' => Carbon::now()
        ]);*/

        /*Article::create(request()->all() + ['user_id' => auth()->id()]);  // quand on utilice cette methide on doit remplire protected $fillable dans Article les
        // colonne qu'on veut inserer*/
        //2eme methode
        Auth::user()->articles()->create(request()->all());
        // 3eme methode auth()->user()->articles()->create(request()->all());
        return redirect()->route('articles.index');
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