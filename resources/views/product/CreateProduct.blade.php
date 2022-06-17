@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
<h1>Creación de artículos o servicios</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_product') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">


            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtcod">Código de barras:</label>
                        <input type="text" name="txtcod" class="form-control" id="txtcod" value="" placeholder="Ingresa un valor">
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="txtdescripcion">Descripción:</label>
                        <input type="text" name="txtdescripcion" class="form-control" id="txtdescripcion" value="" placeholder="Ingresa un valor">
                    </div>

                    @error('txtdescripcion')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese descripción</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtunidadmedida">Unidad de medida:</label>
                        <select name="txtunidadmedida" id="txtunidadmedida" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($umedida as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->unidadmedida }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtunidadmedida')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtfamilia">Familia del producto o servicio:</label>
                        <select name="txtfamilia" id="txtfamilia" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($familia as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcionfamilia }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtfamilia')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtminimo">Stock Mínimo:</label>
                        <input type="number" name="txtminimo" class="form-control" id="txtminimo" value="" placeholder="Ingresa un valor">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtmaximo">Stock Máximo:</label>
                        <input type="number" name="txtmaximo" class="form-control" id="txtmaximo" value="" placeholder="Ingresa un valor">
                    </div>
                </div>

            </div>

            <!-- fin línea-->
            

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtobservaciones">Observaciones:</label>
                        <input type="text" name="txtobservaciones" class="form-control" id="txtobservaciones" value="" placeholder="Ingresa un valor">
                    </div>
                </div>

            </div>
            <!-- fin línea-->


            <div class="card-boody">
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Registrar</button>

            </div>
        </div>


    </form>

</div>

@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop