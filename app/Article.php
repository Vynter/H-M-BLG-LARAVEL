<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = [
        'published_at',
    ];
    public function getPublishedAtFormatedAttribute()
    {
        //return Carbon::parse($this->published_at)->diffForhumans();
        return $this->published_at->diffForhumans();
    }

    public function scopeRecherche($q)
    {
        $q->where('name', 'like', '%' . request('q') . '%')
            ->orWhere('body', 'like', '%' . request('q') . '%');
    }

    /**
     * scopeDernier
     *
     * @param  mixed $q query
     * @param  mixed $nb limiter
     * @return void retour les dix derniers articles a utilisé dans le widget
     */
    public function scopeDernier($q, $nb = 10)
    {
        $q->latest('published_at')->take($nb);
        //$q->latest('published_at')->paginate(10, ['id', 'name'], 'feuille');
        //$lastArticles = Article::latest('published_at')->paginate(10, ['id', 'name'], 'feuille'); la base
    }
}