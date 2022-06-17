@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Lista de ventas y despachos</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>

                        <th>Area</th>
                        <th>#venta</th>
                        <th>Fecha venta</th>
                        <th>Pedido</th>
                        <th>Fecha Pedido</th>                        
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad pedido</th>
                        <th>Cantidad venta</th>
                        <th>Total venta</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $item)
                        <tr>
                            <td>{{$item->area}}</td>
                            <td>{{$item->venta}}</td>
                            <td>{{$item->fecha_venta}}</td>
                            <td>{{$item->pedido}}</td>
                            <td>{{$item->fecha_pedido}}</td>
                            <td>{{$item->nombres}} {{$item->apellidos}}</td>
                            <td>{{$item->producto}} {{$item->unidadmedida}}</td>
                            <td>{{$item->cant_pedido}}</td>
                            <td>{{$item->cant_venta}}</td>
                            <td>Q. {{$item->total_iva + $item->total_venta }}</td>                            
                            <td>
                                <a href="{{route('edit_sale',$item->venta)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_sale',$item->venta) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
                                    @method('PUT')
                                    @csrf
                                        <button class="btn btn-danger fas fa-trash-alt " type="submit" ></button>
                                </form>
                                <a href="{{route('invoice',$item->venta)}}" class="btn btn-dark"><i class="fas fa-file-pdf" title="Generar Factura"></i></a>                                              
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
