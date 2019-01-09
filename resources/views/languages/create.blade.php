
@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowy Język</h1>
</div>
<form action="{{ action('LanguagesController@store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="symbol">Symbol</label>
    <textarea class="form-control" name="symbol"></textarea>
</div>

<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ action('LanguagesController@index') }}" class="btn btn-link">Powrót</a>
</form>

@endsection