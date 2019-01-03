@extends('layouts.app')

@section('content')
{!! $chart->container() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
{!! $chart->script() !!}
{!! $chart1->container() !!}
{!! $chart1->script() !!}
@endsection