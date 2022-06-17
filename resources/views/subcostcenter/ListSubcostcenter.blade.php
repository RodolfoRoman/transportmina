@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
<h1>Lista de tipos de centros de costo nivel 2</h1>
@stop

@section('content')

<div class="card card-danger card-outline">
    <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>CeCos Nv. 1</th>
                    <th>Cecos Nv. 2</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcentros as $item)
                <tr>
                    <td>{{$item->id_center}}.{{$item->id}}  </td>
                    <td>{{$item->descripcioncecos}}</td>
                    <td>{{$item->subcentrocosto}}</td>
                    <td>
                        <a href="{{route('edit_subcostcenter',$item->id)}}" class="btn btn-info"><i class="fas fa-edit" title="Editar registro"></i></a>
                        <form action="{{ route('destroy_subcostcenter',$item->id) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-danger fas fa-trash-alt " type="submit"></button>
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