@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj Podkategorię</h1>
</div>

<form action="{{ url('/category/'.$categoryId.'/update/'.$id) }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" value="{{$subcategories->name}}" name="name" />
</div>
<div class="form-group">
    <label for="description">Opis</label>
    <input type="text" class="form-control" value="{{$subcategories->description}}" name="description" />
</div>
<div class="form-group">
<label for="categoryId">Kategoria</label>
    <select name="categoryId">
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($subcategories->categories_id == $category->id) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="picture_file_name">Podaj nazwę obrazka z pliku public/img/...</label>
    <input type="text" class="form-control" value="{{$subcategories->picture_file_name}}" name="picture_file_name" />
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
<input type="submit" value="Wykonaj" class="btn btn-primary" />
<a href="{{ url('/category/'.$categoryId) }}" class="btn btn-link">Anuluj</a>
</form>

@endsection