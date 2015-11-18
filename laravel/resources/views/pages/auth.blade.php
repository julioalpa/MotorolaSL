@extends('layouts.default')

@section('content')

    <h1>Iniciar Sesión</h1>

    @include('partials.errors')

    <form action="{{ route('auth_show_path') }}" method="post">

        {{ csrf_field() }}

        <label for="email">Email:</label>

        <input class="form-control" type="text" name="email" value="{{old('email')}}">

        <br><br>

        <label for="password">Contraseña:</label>

        <input class="form-control" type="password" name="password">

        <br><br><br>

        <input class="btn btn-primary" type="submit" value="Login">

    </form>

@stop
