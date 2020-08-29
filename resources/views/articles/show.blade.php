@extends('layouts')

@section('title',$article->name)



@section('content')
<div>
    <h1>{{$article->id.' - '.$article->name }}</h1>
    <small>publié il y a : {{ $article->PublishedAtFormated }}</small>
    <h6> 2eme facon d'écrire publié il y a : {{ $article->published_at_formated }}</h6>
    <p>{{$article->body}}</p>



    <div class="float-right">
        <a style="display:inline-block;" href="{{route('articles')}}">Revenir a la liste des articles <i class="fas fa-arrow-right"></i></a>
        </div>

</div>
@endsection
