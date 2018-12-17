@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Kategorie</h1>
</div>

<!-- <div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('PieczywoController@create') }}" class="btn btn-info">Nowy rodzaj pieczywa</a>
    </div>
</div> -->

<div class="row">
@foreach($categories as $category)
    <div class="col-md-4">
        <img src="./resources/img/{{$category->picture_file_name}}"/>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
    </div>
@endforeach
</div>

@endsection