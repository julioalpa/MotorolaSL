@extends('layouts.sidebar')
@section('title') Home @endsection
@section('content')
@include('partials.errors')

<form method="post" action="{{ route('home_store_path') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <textarea id="textarea1" class="form-control" name= "consultaImeis"></textarea>
        <label for="textarea1" class="label-info">IMEIs (uno debajo de otro)</label>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="boton">CONSULTAR</button>
</form>

@endsection