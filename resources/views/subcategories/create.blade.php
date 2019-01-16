@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowa Podkategoria</h1>
</div>

<form action="{{ url('/category/'.$categoryId.'/store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="description">Opis kategorii</label>
    <textarea class="form-control" name="description"></textarea>
</div>
<div class="form-group">
    <label for="picture_file_name">Podaj nazwę obrazka z pliku public/img/...</label>
    <input type="text" class="form-control" name="picture_file_name"></textarea>
</div>

<div class="form-group">
<label for="userId">Redaktorzy:</label>
        @foreach($users as $user)
            @if($user->user_role)
                <br>
                <label><input type="checkbox" name="userId[]" value="{{$user->id}}"> {{$user->name}} </label>
            @endif
        @endforeach
</div>

<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ url('/category/'.$categoryId) }}" class="btn btn-link">Powrót</a>
</form>

@endsection