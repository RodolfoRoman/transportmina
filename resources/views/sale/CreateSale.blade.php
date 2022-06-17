@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
<h1>Registrar venta</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_sale') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtfecha">Fecha venta:</label>
                        <input type="date" name="txtfecha" class="form-control" id="txtfecha" value="">
                    </div>

                    @error('txtfecha')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una fecha válida</div>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtpedido">Seleccione pedido:</label>
                        <select name="txtpedido" id="txtpedido" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($ordenes as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->id }} - {{ $item->apellidos }}, {{ $item->nombres }} - {{ $item-> producto }} - {{ $item-> unidadmedida }} -- {{ $item-> cantidad }} 
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtpedido')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un pedido</div>
                    @enderror

                </div>

            </div>

            <!-- fin línea-->
            <div class="row">

                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="txtiva">% IVA:</label>
                        <input type="number" name="txtiva" class="form-control" id="txtiva" value="12" placeholder="Ingresa un valor" readonly="true">
                    </div>
                    @error('txtiva')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un pedido</div>
                    @enderror
                </div>


                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad despachada:</label>
                        <input type="number" name="txtcantidad" class="form-control" id="txtcantidad" value="1" placeholder="Ingresa un valor">
                    </div>

                    @error('txtcantidad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese cantidad producida</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtprecioventa">Precio venta: (Q - Quetzales) </label>
                        <input type="number" name="txtprecioventa" class="form-control" id="txtprecioventa" value="1" placeholder="Ingresa un valor">
                    </div>

                    @error('txtprecioventa')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese cantidad vendida</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtsubtotal">Sub total venta:</label>
                        <input type="number" name="txtsubtotal" class="form-control" id="txtsubtotal" value="1" placeholder="Ingresa un valor" readonly="true">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txttotaliva">Descuento IVA:</label>
                        <input type="number" name="txttotaliva" class="form-control" id="txttotaliva" value="1" placeholder="Ingresa un valor" readonly="true">
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