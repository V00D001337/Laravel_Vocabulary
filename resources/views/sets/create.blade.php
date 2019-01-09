@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowy Zestaw</h1>
</div>
<form action="{{ url('/subcategory/'.$subcategoryId.'/store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="name">Nazwa</label>
    <input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
    <label for="words">Słowa</label>
    <textarea class="form-control" name="words"></textarea>
</div>
<div class="form-group">
    <table class="table">
        <tr>
            <td>
                <label for="language1">Język tłumaczony</label>
                <select name="language1">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <label for="language2">Język tłumaczenia</label>
                <select name="language2">
                    @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
</div>
<div class="form-group">
     
</div>
<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ url('/subcategory/'.$subcategoryId) }}" class="btn btn-link">Powrót</a>
</form>

@endsection