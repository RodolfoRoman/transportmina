@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Lista de empleados</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Correlativo</th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($planillas as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->anio}}</td>
                            <td>{{$item->mes}}</td>
                            <td>
                                <a href="{{route('download_payroll',$item->id)}}" class="btn btn-info"><i class="fas fa-arrow-circle-down " title="Descargar planilla"></i></a>
                                <form action="{{route('destroy_payroll',$item->id)}}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
                                    @method('PUT')
                                    @csrf
                                        <button class="btn btn-danger fas fa-trash-alt " type="submit" ></button>
                                </form>                                              
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
