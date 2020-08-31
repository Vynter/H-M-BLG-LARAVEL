<?php

namespace App;

use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = [
        'published_at',
    ];

    protected $fillable = ['name', 'body', 'published_at', 'user_id'];

    //------------------------------------------Attribute (mutator)
    public function getPublishedAtFormatedAttribute()
    {
        //return Carbon::parse($this->published_at)->diffForhumans();
        return $this->published_at->diffForhumans();
    }

    public function getNameSearchableAttribute()
    {
        return str_replace(request('q'), '<mark class="bg-warning">' . request('q') . '</mark>', $this->name);
    }

    public function getBodySearchableAttribute()
    {
        return str_replace(request('q'), '<mark class="bg-danger">' . request('q') . '</mark>', $this->body);
    }

    //------------------------------------------Scope
    public function scopeRecherche($q)
    {
        $q->where('name', 'like', '%' . request('q') . '%')
            ->orWhere('body', 'like', '%' . request('q') . '%')
            ->orWherehas('creator', function ($user) { // orWherehas('creator', function ($user) use($q) dans le cas ou on declare $q=request('q')
                $user->where('name', 'like', '%' . request('q') . '%');
            });
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


    //---------------------------Relation


    /**relation one to many */
    public function creator()
    {
        /**
         * il y a deux solutions a cela ou bien nomé la methode user afin que belogsTo fais le lien avec user_id
         * dans le cas ou la mathode a un autre nom on rajotue un second paramétre user_id
         */
        return $this->belongsTo(User::class, 'user_id');
    }
    /**relation many to mnay */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}