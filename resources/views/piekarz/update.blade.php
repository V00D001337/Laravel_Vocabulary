@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edytuj piekarza</h1>
</div>

<form action="{{ action('PiekarzController@update', $p->id) }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
    <label for="imie">Imie</label>
    <input type="text" class="form-control" name="imie" value="{{$p->imie}}"/>
</div>
<div class="form-group">
    <label for="nazwisko">Nazwisko</label>
    <input type="text" class="form-control" name="nazwisko" value="{{$p->nazwisko}}"/>
</div>
<div class="form-group">
    <label for="data_zatrudnienia">Data zatrudnienia</label>
    <input type="date" class="form-control" name="data_zatrudnienia" value="{{$p->data_zatrudnienia}}"/>
</div>
<div class="form-group">
    <label for="specjalnosc">Specjalność</label>
    <select name="specjalnosc">
        @foreach($pieczywo as $pie)
            <option value="{{$pie->id}}" @if($p->specjalnosc == $pie->id) selected @endif>{{$pie->nazwa}}</option>
        @endforeach
    </select> 
</div>
<div class="form-group">
    <label for="ubezpieczenie">Ubezpieczenie
    <input type="checkbox" class="form-control" name="ubezpieczenie" @if($p->ubezpieczenie == 1) checked @endif/></label>
</div>
<input type="submit" value="Edytuj" class="btn btn-primary" />
<a href="{{ action('PiekarzController@index') }}" class="btn btn-link">Powrót</a>
</form>

@endsection