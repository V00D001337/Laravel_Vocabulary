@extends('../template')
@section('content')
<div class="page-header" >
<h1>Edytuj pracownika! </h1>
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

<form action="{{ action('PracownikController@update',$prac->id) }}" method="POST" role="form">
<div class="form-group">
            <label for="imie">Imie</label>
            <input type="text" class="form-control" name="imie" value="{{ $prac->imie }}"/>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </div>
<div class="form-group">
            <label for="nazwisko">Nazwisko</label><br />
            <input type="text" class="form-control" name="nazwisko" value="{{ $prac->nazwisko }}"/>
        </div>
<div class="form-group">
            <label for="data_ur">Data Urodzenia (YYYY-MM-DD)</label><br />
            <input type="text" class="form-control" name="data_ur" value="{{ $prac->data_ur }}"/>
        </div>
		<div class="nr_tel">
            <label for="nr_tel">Nr_tel</label><br />
            <input type="text" class="form-control" name="nr_tel" value="{{ $prac->nr_tel }}"/>
        </div>
        <div class="pensja">
            <label for="pensja">Pensja</label><br />
            <input type="text" class="form-control" name="pensja" value="{{ $prac->pensja }}"/>
        </div>
        <input type="submit" value="Wykonaj" class="btn btn-primary" />
        <a href="{{ action('PracownikController@index') }}" class="btn btn-link">Powrot</a>
    </form>
@stop