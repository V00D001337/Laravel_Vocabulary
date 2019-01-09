@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj Język</h1>
</div>

<form action="{{ action('LanguagesController@update', $languages->id) }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" value="{{$languages->name}}" name="name" />
</div>
<div class="form-group">
    <label for="description">Symbol</label>
    <input type="text" class="form-control" value="{{$languages->symbol}}" name="symbol" />
</div>

<input type="submit" value="Wykonaj" class="btn btn-primary" />
<a href="{{ action('LanguagesController@index') }}" class="btn btn-link">Anuluj</a>
</form>

@endsection