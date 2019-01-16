@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj Użytkownika</h1>
</div>

<form action="{{ url('/user/update/'.$id) }}" method="post" role="form"  autocomplete="off">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" value="{{$user->name}}" name="name" />
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" value="{{$user->email}}" name="email" />
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" value="{{$user->password}}" name="password" />
</div>
<div class="form-group">
<label for="type">Typ użytkownika:</label>
<select name="type">
    @foreach($roles as $role)
        <option value="{{$role->id}}" @if($user->user_role && $role->id == $user->user_role->role->id) selected @endif>{{$role->name}}</option>
    @endforeach
    <option value="-1" @if(!$user->user_role) selected @endif>Użytkownik</option>
</select>
</div>

<input type="submit" value="Zapisz" class="btn btn-primary" />
<a href="{{ url('/user') }}" class="btn btn-link">Powrót</a>
</form>
@endsection