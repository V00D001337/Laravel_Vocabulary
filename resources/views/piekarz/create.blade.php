@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Nowy piekarz</h1>
</div>

<form action="{{ action('PiekarzController@store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="imie">Imie</label>
    <input type="text" class="form-control" name="imie" />
</div>
<div class="form-group">
    <label for="nazwisko">Nazwisko</label>
    <input type="text" class="form-control" name="nazwisko" />
</div>
<div class="form-group">
    <label for="data_zatrudnienia">Data zatrudnienia</label>
    <input type="date" class="form-control" name="data_zatrudnienia" />
</div>
<div class="form-group">
    <label for="specjalnosc">Specjalność</label>
    <select name="specjalnosc">
        @foreach($pieczywo as $p)
            <option value="{{$p->id}}">{{$p->nazwa}}</option>
        @endforeach
    </select> 
</div>
<div class="form-group">
    <label for="ubezpieczenie">Ubezpieczenie
    <input type="checkbox" class="form-control" name="ubezpieczenie"/></label>
</div>
<input type="submit" value="Dodaj" class="btn btn-primary" />
<a href="{{ action('PiekarzController@index') }}" class="btn btn-link">Powrót</a>
</form>

@endsection