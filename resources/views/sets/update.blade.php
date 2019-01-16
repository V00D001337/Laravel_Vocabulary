@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj zestaw</h1>
</div>
<form action="{{ url('/subcategory/'.$subcategoryId.'/update/'.$id) }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" value="{{$set->name}}" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="words">Słowa</label>
    <textarea class="form-control" name="words">{{$set->words}}</textarea>
</div>
<label for="subcategoryId">Podkategoria</label>
<select name="subcategoryId">
    @foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" @if($set->subcategories_id == $subcategory->id) selected @endif>{{$subcategory->name}}</option>
    @endforeach
</select>
<div class="form-group">
    <table class="table">
        <tr>
            <td>
                <label for="language1">Język tłumaczony</label>
                <select name="language1">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}" @if($set->languages1_id == $language->id) selected @endif>{{$language->name}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <label for="language2">Język tłumaczenia</label>
                <select name="language2">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}" @if($set->languages2_id == $language->id) selected @endif>{{$language->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
</div>
@if (!Auth::guest() && Auth::user()->atLeastSuperRedactor)
<div class="form-group">
    <label><input type="checkbox" name="hidden" @if($set->private == 1) checked @endif> Prywatny</label>
</div>
@endif
<input type="submit" value="Edytuj" class="btn btn-primary" />
<a href="{{ url('/subcategory/'.$subcategoryId) }}" class="btn btn-link">Powrót</a>
</form>

@endsection