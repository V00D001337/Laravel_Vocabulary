
@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowa Kategoria</h1>
</div>
<form action="{{ action('CategoriesController@store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="description">Opis</label>
    <textarea class="form-control" name="description"></textarea>
</div>
<div class="form-group">
    <label for="picture_file_name">Podaj nazwę obrazka z pliku public/img/...</label>
    <input type="text" class="form-control" name="picture_file_name"></textarea>
</div>
<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ action('CategoriesController@index') }}" class="btn btn-link">Powrót</a>
</form>

@endsection