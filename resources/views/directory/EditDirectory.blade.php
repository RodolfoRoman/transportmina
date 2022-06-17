@extends('adminlte::page')

@section('title', 'Directorio')

@section('content_header')
<h1>Modificación de directorios</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">
    <form action="{{ route('update_directory', $directorio[0]->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtapellidos">Apellidos o razón razón social:</label>
                        <input type="text" name="txtapellidos" class="form-control" id="txtapellidos" value="{{$directorio[0]->apellidos}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtapellidos')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese apellidos o razón social</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtnombres">Nombres o nombre comercial:</label>
                        <input type="text" name="txtnombres" class="form-control" id="txtnombres" value="{{$directorio[0]->nombres}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtnombres')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese nombres o nombre comercial</div>
                    @enderror
                </div>
            </div>

            <!-- fin de línea-->

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtemail">Correo electrónico:</label>
                        <input type="email" name="txtemail" class="form-control" id="txtemail" value="{{$directorio[0]->email}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtemail')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un correo válido</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtdireccion">Dirección de comicilio:</label>
                        <input type="text" name="txtdireccion" class="form-control" id="txtdireccion" value="{{$directorio[0]->direccion}}" placeholder="Ingresa un valor">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txttelefono">Teléfono:</label>
                        <input type="text" name="txttelefono" class="form-control" id="txttelefono" value="{{$directorio[0]->telefono}}" placeholder="Ingresa un valor">
                    </div>
                </div>
            </div>

            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtnit">NIT:</label>
                        <input type="text" name="txtnit" class="form-control" id="txtnit" value="{{$directorio[0]->nit}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtnit')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un NIT válido</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtdpi">Documento de indentificación Personal:</label>
                        <input type="text" name="txtdpi" class="form-control" id="txtdpi" value="{{$directorio[0]->dpi}}" placeholder="Ingresa un valor">
                    </div>

                    @error('txtdpi')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un DPI válido</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtcotribuyente">Tipo de contribuyente:</label>
                        <select name="txtcotribuyente" id="txtcotribuyente" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$directorio[0]->contribuyente}}">
                                    {{$directorio[0]->contribuyente}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                <option value="Ninguno">Ninguno</option>
                                <option value="Pequeño contribuyente">Pequeño contribuyente</option>
                                <option value="Regimen 31%">Regimen 31%</option>
                                <option value="5% Definitivo">5% Definitivo</option>
                                <option value="Retención 65%">Retención 65%</option>
                            </optgroup>
                        </select>
                    </div>

                    @error('txtcotribuyente')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txttipodir">Tipo de Directorio:</label>
                        <select name="txttipodir" id="txttipodir" class="form-control">
                            <optgroup label="Selección Actual">
                                <option data-select2-id="#" value="{{$directorio[0]->id_tipe}}">
                                    {{$directorio[0]->tipodirectorio}}
                                </option>
                            </optgroup>
                            <optgroup label="Seleccione nuevamente">
                                @foreach ($tipe_directory as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->tipodirectorio }}
                                    </option>
                                @endforeach
                        </select>
                        </optgroup>
                        </select>
                    </div>

                    @error('txttipodir')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="card-boody">
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Actualizar registro</button>
                <a href="{{ route('list_directory') }}" class="btn btn-danger">
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