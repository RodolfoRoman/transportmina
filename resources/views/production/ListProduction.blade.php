@extends('adminlte::page')

@section('title', 'Producción')

@section('content_header')
    <h1>Producción registrada</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Transacción</th>
                        <th>Fecha de producción</th>
                        <th>Mina</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($produccion as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->fecha_produccion}}</td>
                            <td>{{$item->area}}</td>
                            <td>{{$item->cod_prod}} - {{$item->producto}} - {{$item->unidadmedida}}</td>
                            <td>{{$item->cantidad_produccion}}</td>
                            <td>
                                <a href="{{route('edit_production',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_production',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
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
