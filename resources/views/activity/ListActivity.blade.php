@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
    <h1>Lista de tipos de actividades</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>                                                                                                                                             
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividad as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->actividad}}</td>
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
