@extends('layouts.app')

@section('content')

<h1>{{$user->name}}</h1>
<form action="{{ action('UserController@updatePrivilages', $user->id) }}" method="post" role="form"  autocomplete="off">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<p>Wybierz kategorie aby nadać uprawnienia</p>
<div class="form-group">
        @foreach($subcategories as $sub) 
        <label><input type="checkbox" name="subID[]" value="{{$sub->id}}"> {{$sub->name}} </label>
        <br>
        @endforeach
</div>
<input type="submit" value="Zapisz" class="btn btn-primary" />
<a href="{{ url('/user') }}" class="btn btn-link">Powrót</a>
</form>
@endsection