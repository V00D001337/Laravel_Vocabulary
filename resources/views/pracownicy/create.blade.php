@extends('../template')
@section('content')
<div class="page-header" >
<h1>Dodaj pracownika! </h1>
</div>
@if ( $errors->count() > 0 )
<div class="alert alert-danger">
<ul>
        @foreach( $errors->all() as $message )</p>
<li>{{ $message }}</li>
        @endforeach
      </ul>
</div>
    @endif
<form action="{{ action('PracownikController@store') }}" method="post" role="form" >
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
            <label for="imie">Imie</label>
            <input type="text" class="form-control" name="imie" />
        </div>
<div class="form-group">
            <label for="nazwisko">Nazwisko</label><br />
            <input type="text" class="form-control" name="nazwisko" />
        </div>
<div class="form-group">
            <label for="data_ur">Data Urodzenia (YYYY-MM-DD)</label><br />
            <input type="text" class="form-control" name="data_ur" />
        </div>
		<div class="nr_tel">
            <label for="nr_tel">Nr_tel</label><br />
            <input type="text" class="form-control" name="nr_tel" />
        </div>
        <div class="pensja">
            <label for="pensja">Pensja</label><br />
            <input type="text" class="form-control" name="pensja" />
        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
        <a href="{{ action('PracownikController@index') }}" class="btn btn-link">Powrot</a>
    </form>
@stop