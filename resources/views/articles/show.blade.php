<div>
    <h1>{{$article->id.' '.$article->name }}</h1>
    <small>publié il y a : {{ Carbon\Carbon::parse($article->published_at)->diffForhumans() }}</small>
    <p>{{$article->body}}</p>

</div>
