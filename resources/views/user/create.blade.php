@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowy Użytkownik</h1>
</div>

<form action="{{ url('/user/store') }}" method="post" role="form"  autocomplete="off">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" />
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" />
</div>
<div class="form-group">
<label for="type">Typ użytkownika:</label>
<select name="type">
    @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
    <option value="-1">Użytkownik</option>
</select>
</div>

<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ url('/user') }}" class="btn btn-link">Powrót</a>
</form>
@endsection