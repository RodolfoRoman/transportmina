@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
    <h1>Lista de meses creados</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Año</th>
                        <th>Mes</th>                                                                                                                                               
                        <th>Presupuesto</th>                                                                                                                                               
                    </tr>
                </thead>
                <tbody>
                    @foreach($meses as $item)
                        <tr>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->anio}}</td>
                            <td>{{$item->mes}}</td>
                            <td>
                            <a href="{{route('presupuesto_mensual',$item->id)}}" class="btn btn-info"><i class="fas fa-calculator" title="Gestionar presupuesto"></i></a>

                            </td>
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
