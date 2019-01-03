@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->container() !!}
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/Chart.bundle.min.js') }}" defer></script>
{!! $chart->script() !!}
@endsection