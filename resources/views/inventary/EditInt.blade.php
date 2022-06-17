@extends('adminlte::page')

@section('title', 'Inventarios')

@section('content_header')
<h1>Modificacion de ingresos</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('update_int', $transaccion[0]->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">




            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtfecha">Fecha de transacción:</label>
                        <input type="date" name="txtfecha" class="form-control" id="txtfecha" value="{{$transaccion[0]->fecha_operacion}}">
                    </div>

                    @error('txtfecha')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una fecha</div>
                    @enderror
                </div>


                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtarea">Area:</label>
                        <select name="txtarea" id="txtarea" class="form-control">
                            <optgroup label="Selección Actual">
                                <option value="{{$transaccion[0]->headquarter_id}}"> {{$transaccion[0]->area}} </option>
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
                        <label for="txtcentro">CeCos:</label>
                        <select name="txtcentro" id="txtcentro" class="form-control">
                            <optgroup label="Selección Actual">

                                <option value="{{$transaccion[0]->costcenter_id}}"> {{ $transaccion[0]->descripcioncecos }} - {{ $transaccion[0]->subcentrocosto }} </option>
                            </optgroup>

                            <optgroup label="Seleccione nuevamente">
                                @foreach ($centro as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->descripcioncecos }} - {{ $item->subcentrocosto }}
                                </option>
                                @endforeach

                            </optgroup>
                        </select>
                    </div>

                    @error('txtcentro')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un centro</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtactividad">Actividad:</label>
                        <select name="txtactividad" id="txtactividad" class="form-control">
                            <optgroup label="Selección Actual">
                                <option value="{{$transaccion[0]->activity_id}}"> {{ $transaccion[0]->actividad }} </option>
                            </optgroup>

                            <optgroup label="Seleccione nuevamente">
                                @foreach ($actividad as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->actividad }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtactividad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una actividad</div>
                    @enderror
                </div>


                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtproducto">Producto:</label>
                        <select name="txtproducto" id="txtproducto" class="form-control">
                            <optgroup label="Selección Actual">

                                <option value="{{$transaccion[0]->product_id}}"> {{ $transaccion[0]->descprod }}- {{ $transaccion[0]->unidadmedida }} </option>
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

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad:</label>
                        <input type="number" name="txtcantidad" class="form-control" id="txtcantidad" value="{{$transaccion[0]->cantidad}}" step="any"> 
                    </div>

                    @error('txtcantidad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una cantidad</div>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="txtprecio">Precio: (Q - Quetzales)</label>
                        <input type="number" name="txtprecio" class="form-control" id="txtprecio" value="{{$transaccion[0]->precio}}" step="any">
                    </div>

                    @error('txtprecio')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un precio</div>
                    @enderror
                </div>

            </div>
            <!-- fin línea-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtdirectorio">Directorio:</label>
                        <select name="txtdirectorio" id="txtdirectorio" class="form-control">
                            <optgroup label="Selección Actual">
                                <option value="{{$transaccion[0]->directory_id}}"> {{ $transaccion[0]->id_dire }} - {{ $transaccion[0]->apellidos }},{{ $transaccion[0]->nombres }} - {{ $transaccion[0]->dpi }} </option>
                            </optgroup>

                            <optgroup label="Seleccione nuevamente">
                                @foreach ($directorio as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->id }} - {{ $item->apellidos }},{{ $item->nombres }} - {{ $item->dpi }}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    @error('txtdirectorio')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>





            </div>


            <div class="card-boody">

                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Actualizar registro</button>
                <a href="{{ route('list_int') }}" class="btn btn-danger">
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