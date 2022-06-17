@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Lista de Pedidos y órdenes</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Area</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenes as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->area}}</td>
                            <td>{{$item->nombres}} {{$item->apellidos}}</td>
                            <td>{{$item->producto}} {{$item->unidadmedida}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>{{$item->estado}}</td>
                            <td>
                                <a href="{{route('edit_order',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_order',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
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
