@extends('layouts.sidebar')
@section('title') Resultados @endsection
@section('content')
    @include('partials.errors')
    <table class="table table-bordered">
        <tr class="active">
            <td><b>IMEI</b></td>
            <td><b>SL</b></td>
            <td><b>Fecha Hora Fabricación</b></td>
            <td><b>Carrier</b></td>
            <td><b>Modelo</b></td>
            <td><b>Familia</b></td>
        </tr>
        @foreach($units as $array)

            @if($array['sl'] == "Sin resultados")
                <tr class="danger">
            @else
                <tr>
            @endif

            @foreach($array as $unit)
                <td><center> {{$unit}} </center></td>
            @endforeach
            </tr>
        @endforeach
    </table>
@endsection