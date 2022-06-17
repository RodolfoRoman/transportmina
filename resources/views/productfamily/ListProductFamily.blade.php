@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
    <h1>Lista de familias</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="list_productfamily" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Corelativo</th>
                        <th>Descripción</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($productfamily as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->descripcionfamilia}}</td>
                            <td>
                                <a href="{{route('edit_productfamily',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_productfamily',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
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
