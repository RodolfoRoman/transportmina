@extends('adminlte::page')

@section('title', 'Directorios')

@section('content_header')
    <h1>Lista de tipos de directorios</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción del tipo de directorio</th>                                                                                                                                             
                    </tr>
                </thead>
                <tbody>
                    @foreach($directorytipe as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->tipodirectorio}}</td>
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
