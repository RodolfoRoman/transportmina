@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
    <h1>Lista de tipos de unidades de medida</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Medida</th>                                                                                                                                             
                    </tr>
                </thead>
                <tbody>
                    @foreach($measure as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->unidadmedida}}</td>
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
