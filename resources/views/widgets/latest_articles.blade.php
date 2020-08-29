
    @inject('articles', 'app\Article')

    @php
        $size= isset($size) ? $size : 10;
    @endphp

    <h3>les derniers articles</h3>
    @foreach ($articles->dernier($size)->get() as $lastArticle)

        <li><a href="{{route('articles.show',$lastArticle)}}"> {{$lastArticle->name}}</a></li>

    @endforeach

