@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3>Czy na pewno chcesz usunąć ten rodzaj pieczywa:</h3>
</div>

<a href="{{ action('PieczywoController@delete', $id) }}" class="btn btn-link">Tak</a>
<a href="{{ action('PieczywoController@index') }}" class="btn btn-link">Nie</a>

@endsection