@extends('layouts')

@section('title','Mon blog')



@section('content')

<form class="form-inline mb-5" action="">
    <input type="text" class="form-control" name="q" value="{{request('q')}}" >
    <button class="btn btn-primary">Recherche</button>
</form>

<div class="row">
    <div class="col-sm-9">
        <h1>Liste des articles</h1>
        @foreach ($articles as $article)
            <div class="border-bottom">
                <h2>{{$article->id.' - '.$article->name }} <small>{{$article->PublishedAtFormated}}</small></h2>
                <p>{{Str::limit($article->body, 150,'...etc') }}</p> <!--Avant la 5.8 str_limit($var,150)-->
                <a class="btn btn-primary  mb-4" href="{{ route('articles.show',$article->id) }}">voir plus </a>

            </div>
        @endforeach


    </div>

    <div class="col-sm-3">
        @include('widgets.latest_articles')
    </div>

</div>
<div class="mt-5 justify-content-center d-flex">
    {{ $articles->appends(request()->all())->links() }} <!--c pour la pagination-->
</div>
@endsection
