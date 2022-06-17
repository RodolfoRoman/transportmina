@extends('adminlte::page')

@section('title', 'Producción')

@section('content_header')
<h1>Registrar producción</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_production') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">


            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtfecha">Fecha producción:</label>
                        <input type="date" name="txtfecha" class="form-control" id="txtfecha" value="">
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
                            <option value=""> Seleccione </option>
                            @foreach ($area as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcion }}
                            </option>
                            @endforeach

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
                            <option value=""> Seleccione </option>
                            @foreach ($producto as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcion }} - {{ $item->unidadmedida }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    @error('txtproducto')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un producto</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad producida:</label>
                        <input type="number" name="txtcantidad" class="form-control" id="txtcantidad" value="1" placeholder="Ingresa un valor">
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
                        <label for="txtobservaciones">Observaciones:</label>
                        <input type="text" name="txtobservaciones" class="form-control" id="txtobservaciones" value="" placeholder="Ingresa un valor">
                    </div>

                    @error('txtobservaciones')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese cantidad producida</div>
                    @enderror
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