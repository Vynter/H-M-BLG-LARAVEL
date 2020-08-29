@extends('layouts')

@section('title',$article->name)



@section('content')
<div class="row m-5">
    <div class="col-sm-9">
        <h1>{{$article->id.' - '.$article->name }}</h1>
        <small>publié il y a : {{ $article->PublishedAtFormated }}</small>
        <h6> 2eme facon d'écrire publié il y a : {{ $article->published_at_formated }}</h6>
        <p>{{$article->body}}</p>
    </div>
    <div class="col-sm-3">
        @include('widgets.latest_articles',['size'=>5])     <!-- size est utilisé dans lastest articles -->
    </div>

</div>
<br>
    <div class="float-right mb-5">
        <a href="{{route('articles')}}">Revenir a la liste des articles <i class="fas fa-arrow-right"></i></a>
    </div>


@endsection
