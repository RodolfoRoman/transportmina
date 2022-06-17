@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
<h1>Modificación de directorios</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">
    <form action="{{ route('update_productfamily', $familia[0]->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtfamiliaproducto">Apellidos o razón razón social:</label>
                        <input type="text" name="txtfamiliaproducto" class="form-control" id="txtfamiliaproducto" value="{{$familia[0]->descripcionfamilia}}" placeholder="Ingresa un valor">
                    </div>

                    <label for="">{{$familia[0]->id}}</label>

                    @error('txtfamiliaproducto')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese apellidos o razón social</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="card-boody">
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Actualizar registro</button>
                <a href="{{ route('list_productfamily') }}" class="btn btn-danger">
                    <i class="fas fa-ban"></i> Cancelar
                </a>
            </div>

        </div>


    </form>

</div>




@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop