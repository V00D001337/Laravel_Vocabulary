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
    <a href="{{ url('/set/'.$setId.'/exam/0') }}">
        Tłumaczenie z {{$set->language1->name}} na {{$set->language2->name}}
    </a>
</div>
<div class="col-md-6 text-center">
    <a href="{{ url('/set/'.$setId.'/exam/1') }}">
        Tłumaczenie z {{$set->language2->name}} na {{$set->language1->name}}
    </a>
</div>

@endsection