@extends('adminlte::page')

@section('title', 'Producción')

@section('content_header')
<h1>Editar producción</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('update_production', $producion[0]->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">


            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtfecha">Fecha producción:</label>
                        <input type="date" name="txtfecha" class="form-control" id="txtfecha" value="{{$producion[0]->fecha_produccion}}">
                    </div>

                    @error('txtfecha')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una fecha válida</div>
                    @enderror
                </div>
            </div>

            <!-- fin de línea-->

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtarea">Área:</label>
                        <select name="txtarea" id="txtarea" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$producion[0]->area_id}}">
                                    {{$producion[0]->area}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($area as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->descripcion }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtarea')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un área</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtproducto">Producto:</label>
                        <select name="txtproducto" id="txtproducto" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$producion[0]->id_prod}}">
                                    {{$producion[0]->producto}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($producto as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->descripcion }} - {{ $item->unidadmedida }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtproducto')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un producto</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad producida:</label>
                        <input type="number" name="txtcantidad" class="form-control" id="txtcantidad" value="{{$producion[0]->cantidad_produccion}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtcantidad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese cantidad producida</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtobservaciones">Detalle de producción:</label>
                        <input type="text" name="txtobservaciones" class="form-control" id="txtobservaciones" value="{{$producion[0]->observaciones}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtobservaciones')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese detalle</div>
                    @enderror
                </div>

            </div>


            <div class="card-boody">

                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Actualizar registro</button>
                <a href="{{ route('list_production') }}" class="btn btn-danger">
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