@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <form class="col s12" method="post" action="{{ route('home_store_path') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name= "txtConsulta"></textarea>
                    <label for="textarea1">IMEIs (uno debajo de otro)</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="boton">CONSULTAR</button>
        </form>
    </div>
@endsection