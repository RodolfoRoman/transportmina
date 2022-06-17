@extends('adminlte::page')

@section('title', 'Artículos')

@section('content_header')
<h1>Creación de artículos o servicios</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('update_product', $articulo[0]->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">


            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtcod">Código de barras:</label>
                        <input type="text" name="txtcod" class="form-control" id="txtcod" value="{{$articulo[0]->codigo}}" placeholder="Ingresa un valor"  readonly="true" >
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="txtdescripcion">Descripción:</label>
                        <input type="text" name="txtdescripcion" class="form-control" id="txtdescripcion" value="{{$articulo[0]->descripcion}}" placeholder="Ingresa un valor">
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
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$articulo[0]->id_measures}}">
                                    {{$articulo[0]->unidadmedida}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($unidad as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->unidadmedida }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtunidadmedida')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>



                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtfamilia">Familia:</label>
                        <select name="txtfamilia" id="txtfamilia" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$articulo[0]->id_productfamilies}}">
                                    {{$articulo[0]->descripcionfamilia}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($familia as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->descripcionfamilia }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtfamilia')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtminimo">Stock Mínimo:</label>
                        <input type="number" name="txtminimo" class="form-control" id="txtminimo" value="{{$articulo[0]->stock_minimo}}" placeholder="Ingresa un valor">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtmaximo">Stock Máximo:</label>
                        <input type="number" name="txtmaximo" class="form-control" id="txtmaximo" value="{{$articulo[0]->stock_maximo}}" placeholder="Ingresa un valor">
                    </div>
                </div>

            </div>

            <!-- fin línea-->


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtobservaciones">Observaciones:</label>
                        <input type="text" name="txtobservaciones" class="form-control" id="txtobservaciones" value="{{$articulo[0]->descripcion_larga}}" placeholder="Ingresa un valor">
                    </div>
                </div>

            </div>
            <!-- fin línea-->


            <div class="card-boody">
                
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i>    Actualizar registro</button>
                <a href="{{ route('list_product') }}" class="btn btn-danger">
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