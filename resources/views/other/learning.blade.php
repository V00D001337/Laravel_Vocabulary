@extends('layouts.app')

@section('content')

<div class="page-header">
    <br>
    <h1>Wybierz sposób nauki:</h1>
    <br>
</div>

<div class="col-md-6 text-center">
    <a href="{{ url('/learning/set/'.$setId) }}">
        Wyświetlanie zawartości zestawu
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/test') }}">
        Własna metoda nauki
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/test') }}">
        Tłumaczenie z {{$set->language1->name}} na {{$set->language2->name}}
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/mode/test') }}">
        Tłumaczenie z {{$set->language2->name}} na {{$set->language1->name}}
    </a>
</div>

@endsection