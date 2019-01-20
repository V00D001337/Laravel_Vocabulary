@extends('layouts.app')

@section('content')

<form action="{{ url('/exam') }}" method="post" role="form" autocomplete="off">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>{{$l1}}</th>
            <th>{{$l2}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$word}}</td>
            <td>
            @if($algorithmId == 5)
                @for($i = 0; $i<$length; $i++)
                <input type = "text" name= "w{{$i}}" maxlength = "1" size = "1"/>
                @endfor
            @elseif($algorithmId == 6)
            @for($i = 0; $i<$length; $i++)
                <input type = "text" name= "w{{$i}}" value = "{{$array[$i]}}" maxlength = "1" size = "1" @if($random == $i)disabled @endif/>
                @endfor
            @else
            <input type="text" class="form-control" name="word" value="{{$letter}}" autofocus/>
            @endif
            </td>
        </tr>
    </tbody>
</table>

<input type="submit" value="Dalej" class="btn btn-primary" />
</form>

@endsection