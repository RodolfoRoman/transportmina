@extends('adminlte::page')

@section('title', 'Articulos')

@section('content_header')
    <h1>Lista de productos y servicios</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Correlativo</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>U/Medida</th>
                        <th>Familia</th>
                        <th>Stock Mínimo</th>
                        <th>Stock Máximo</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->medi}}</td>
                            <td>{{$item->fami}}</td>
                            <td>{{$item->stock_minimo}}</td>
                            <td>{{$item->stock_maximo}}</td>
                            <td>{{$item->descripcion_larga}}</td>
                            <td>
                                <a href="{{route('edit_product',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_product',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
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
