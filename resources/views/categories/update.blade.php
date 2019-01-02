@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj Kategorię</h1>
</div>

<form action="{{ action('CategoriesController@update', $categories->id) }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" value="{{$categories->name}}" name="name" />
</div>
<div class="form-group">
    <label for="description">Opis kategorii</label>
    <input type="text" class="form-control" value="{{$categories->description}}" name="description" />
</div>
<div class="form-group">
    <label for="picture_file_name">Podaj nazwę obrazka z pliku public/img/...</label>
    <input type="text" class="form-control" value="{{$categories->picture_file_name}}" name="picture_file_name" />
</div>
<input type="submit" value="Wykonaj" class="btn btn-primary" />
<a href="{{ action('CategoriesController@index') }}" class="btn btn-link">Anuluj</a>
</form>

@endsection