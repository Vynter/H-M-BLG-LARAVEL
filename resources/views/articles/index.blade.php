@extends('layouts')

@section('title','Mon blog')



@section('content')

<div class="row">
    <div class="col-sm-8">
        <h1>Liste des articles</h1>
        @foreach ($articles as $article)
            <div class="border-bottom">
                <h2>{{$article->id.' - '.$article->name }} <small>{{$article->PublishedAtFormated}}</small></h2>
                <p>{{Str::limit($article->body, 150,'...etc') }}</p> <!--Avant la 5.8 str_limit($var,150)-->
                <a class="btn btn-primary  mb-4" href="{{ route('articles.show',$article->id) }}">voir plus </a>

            </div>
        @endforeach


    </div>
    <div class="col-sm-4">
        <h3>les derniers articles</h3>
        @foreach ($lastArticles as $lastArticle)

            <li><a href="{{route('articles.show',$lastArticle)}}"> {{$lastArticle->name}}</a></li>

        @endforeach
    </div>

</div>
<div class="mt-5 justify-content-center d-flex">
    {{ $articles->links() }} <!--c pour la pagination-->
</div>
@endsection
