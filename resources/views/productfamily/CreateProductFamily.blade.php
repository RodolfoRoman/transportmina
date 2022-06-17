@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
<h1>Creación de familias de productos</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_productfamily') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            
        
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtdescripcionfamilia">Descripción de familias:</label>
                        <input type="text" name="txtdescripcionfamilia" class="form-control" id="txtdescripcionfamilia" value="" placeholder="Ingresa un valor">
                    </div>

                    @error('txtdescripcionfamilia')
                            <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una descripción</div>
                    @enderror
                </div>
            </div>

            <!-- fin de línea-->

            

                <!-- fin línea-->

            <div class="card-boody">
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i
                        class="fas fa-save"></i> Registrar</button>

            </div>
        </div>  


    </form>

</div>




@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop