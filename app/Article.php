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
}