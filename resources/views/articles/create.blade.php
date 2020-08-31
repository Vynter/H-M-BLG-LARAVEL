@extends('layouts')
@section('title','création d\'un article')

@section('content')
<h1 style="text-align:center">Formulaire de creation article</h1>
<form action="{{route('articles.store')}}" class="form mt-5" method="POST">
    @csrf
    <div class="form-group">
        <label for="my-input">Titre</label>
        <input type="text" class="form-control" placeholder="Titre" name="name">
    </div>
    <div class="form-group">
        <label for="my-input">Contenu</label>
        <input type="text" class="form-control" placeholder="Contenu" name="body">
    </div>
    <div class="form-group">
        <label for="my-input">Date de publication</label>
        <input type="date" class="form-control" placeholder="Contenu" name="published_at">
    </div>
    <!--<div class="form-group">
        <input type="hidden" name="user_id" value=1>
    </div>-->
    <button type="submit" class="btn btn-success btn-lg">Sauvegarder</button>
</form>

@endsection

