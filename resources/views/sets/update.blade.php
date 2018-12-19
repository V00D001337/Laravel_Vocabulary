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
<div class="form-group">
    <label for="numberOfWords">Liczba wyrazów</label>
    <input type="number" value="{{$set->number_of_words}}" class="form-control" name="numberOfWords" />
</div>
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
<div class="form-group">
     
</div>
<input type="submit" value="Edytuj" class="btn btn-primary" />
<a href="{{ url('/subcategory/'.$subcategoryId) }}" class="btn btn-link">Powrót</a>
</form>

@endsection