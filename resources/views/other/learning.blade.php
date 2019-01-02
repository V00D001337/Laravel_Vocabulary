@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wybierz sposób nauki:</h1>
    <br>
</div>

<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/learning') }}">
        Wyświetlanie zawartości zestawu
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/test') }}">
        Własna metoda nauki
    </a>
</div>
<div class="col-md-6 text-center">
    <form action="{{ url('/set/'.$setId.'/exam/0') }}" method="get" role="form" >
        <a href="{{ url('/set/'.$setId.'/exam/0') }}" onclick="$(this).closest('form').submit();">
            Tłumaczenie z {{$set->language1->name}} na {{$set->language2->name}}
        </a>
        <br>
        Typ:
        <select name="amountOfTries">
            <option value="0">Jedna próba</option>
            <option value="1">Wiele prób</option>
        </select>
    </form>
</div>
<div class="col-md-6 text-center">
    <form action="{{ url('/set/'.$setId.'/exam/1') }}" method="post" role="form" >
        <a href="{{ url('/set/'.$setId.'/exam/1') }}" onclick="$(this).closest('form').submit()">
            Tłumaczenie z {{$set->language2->name}} na {{$set->language1->name}}
        </a>
        <br>
        Typ:
        <select>
            <option value="0">Jedna próba</option>
            <option value="1">Wiele prób</option>
        </select>
    </form>
</div>

@endsection