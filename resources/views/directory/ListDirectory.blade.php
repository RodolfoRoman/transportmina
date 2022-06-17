@extends('adminlte::page')

@section('title', 'Directorios')

@section('content_header')
    <h1>Lista de directorios</h1>
@stop

@section('content')

    <div class="card card-danger card-outline">
        <div class="card-body">
            
            <table id="listdirectory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Apellidos / Nombre comercial</th>
                        <th>Nombres / Razon social</th>
                        <th>Tipo Contribuyente</th>
                        <th>Direccion</th>
                        <th>NIT</th>
                        <th>DPI</th>
                        <th>Email</th>
                        <th>Tipo directorio</th>
                        <th>Acciones</th>                                                                                                                                                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($directory as $item)
                        <tr>
                            <td>{{$item->apellidos}}</td>
                            <td>{{$item->nombres}}</td>
                            <td>{{$item->contribuyente}}</td>
                            <td>{{$item->direccion}}</td>
                            <td>{{$item->nit}}</td>
                            <td>{{$item->dpi}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->tipodirectorio}}</td>
                            <td>
                                <a href="{{route('edit_directory',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                                <form action="{{ route('destroy_directory',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
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
