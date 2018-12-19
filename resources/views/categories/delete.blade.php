@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3>Czy na pewno chcesz usunąć tą Kategorię?:</h3>
</div>

<a href="{{ action('CategoriesController@delete', $id) }}" class="btn btn-danger">Tak</a>
<a href="{{ action('CategoriesController@index') }}" class="btn btn-link">Nie</a>

@endsection