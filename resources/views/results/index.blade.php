@extends('layouts.app')

@section('content')
<h1>Postępy w nauce</h1>
<div>
{!! $chart->container() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
{!! $chart->script() !!}
</div>
<div>
{!! $chart1->container() !!}
{!! $chart1->script() !!}
</div>
@endsection