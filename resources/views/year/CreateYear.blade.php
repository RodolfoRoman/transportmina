@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
<h1>Creación de años contables</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_year') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            
        
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtanio">Año contable a crear:</label>
                        <input type="number" name="txtanio" class="form-control" id="txtanio" value="0" placeholder="Ingresa un valor">
                    </div>

                    @error('txtanio')
                            <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un año correcto</div>
                    @enderror
                </div>
            </div>

            <!-- fin de línea-->

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