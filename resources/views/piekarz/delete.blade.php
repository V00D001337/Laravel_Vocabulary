@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3>Czy na pewno chcesz usunąć tego piekarza:</h3>
</div>

<a href="{{ action('PiekarzController@delete', $id) }}" class="btn btn-link">Tak</a>
<a href="{{ action('PiekarzController@index') }}" class="btn btn-link">Nie</a>

@endsection