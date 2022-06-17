@extends('adminlte::page')

@section('title', 'Sedes')

@section('content_header')
<h1>Lista de tipos de Sedes</h1>
@stop

@section('content')

<div class="card card-danger card-outline">
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripcion</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach($headquarter as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->descripcion}}</td>
                    <td>{{$item->direccion}}</td>
                    <td>{{$item->telefono}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>


@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop