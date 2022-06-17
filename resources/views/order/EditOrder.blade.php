@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
<h1>Lista de Pedidos y órdenes</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('update_order', $orden[0]->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtfecha">Fecha producción:</label>
                        <input type="date" name="txtfecha" class="form-control" id="txtfecha" value="{{$orden[0]->fecha_pedido}}">
                    </div>

                    @error('txtfecha')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una fecha válida</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtarea">Sede para realizar pedido:</label>
                        <select name="txtarea" id="txtarea" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$orden[0]->area_id}}">
                                    {{$orden[0]->area}}
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
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una sede</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtcliente">Cliente:</label>
                        <select name="txtcliente" id="txtcliente" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$orden[0]->cliente_id}}">
                                    {{$orden[0]->apellidos}}, {{$orden[0]->nombres}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($cliente as $item)
                                <option value="{{ $item->id }}">
                                    {{$orden[0]->apellidos}}, {{$orden[0]->nombres}}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtcliente')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un cliente</div>
                    @enderror
                </div>

            </div>

            <!-- fin línea-->
            <div class="row">

                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="txtproducto">Producto a despachar:</label>
                        <select name="txtproducto" id="txtproducto" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$orden[0]->producto_id}}">
                                    {{$orden[0]->producto}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($productos as $item)
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

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad:</label>
                        <input type="number" name="txtcantidad" class="form-control" id="txtcantidad" value="{{ $orden[0]->cantidad }}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtcantidad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese cantidad producida</div>
                    @enderror
                </div>
            </div>


            <!-- fin línea-->

            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="txtestado">Cambiar estado al pedido:</label>
                        <select name="txtestado" id="txtestado" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$orden[0]->estado}}">
                                    {{$orden[0]->estado}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                <option value="Inactivo">
                                    Eliminar
                                </option>
                                <option value="Anulado">
                                    Anulado
                                </option>
                            </optgroup>
                        </select>
                    </div>

                    @error('txtestado')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un producto</div>
                    @enderror
                </div>

            </div>


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