salam
<div>
    @foreach ($articles as $article)
        <h2>{{ $article->name }}</h2>
        <p>{{Str::limit($article->body, 150,'...etc') }}</p> <!--Avant la 5.8 str_limit($var,150)-->
<a href="{{ route('articles.show',$article->id) }}">voir plus </a>
    @endforeach
</div>
