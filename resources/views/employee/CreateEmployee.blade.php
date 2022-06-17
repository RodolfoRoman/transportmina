@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<h1>Creación de empleados</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_employee') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">


            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtdirectorio">Directorio:</label>
                        <select name="txtdirectorio" id="txtdirectorio" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($directorio as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->id }} - {{ $item->apellidos }},{{ $item->nombres }} - {{ $item->dpi }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtdirectorio')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>
            </div>

            <!-- fin línea-->

            <div class="row">





                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtfechainicio">Fecha de inicio de labores:</label>
                        <input type="date" name="txtfechainicio" class="form-control" id="txtfechainicio" value="">
                    </div>

                    @error('txtfechainicio')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtestado">Estado del empleado:</label>
                        <select name="txtestado" id="txtestado" class="form-control">
                            <option value=""> Seleccione </option>
                            <option value="Activo"> Activo </option>
                            <option value="Inactivo"> Inactivo </option>
                        </select>
                    </div>

                    @error('txtestado')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtfechabaja">Fecha de baja de labores:</label>
                        <input type="date" name="txtfechabaja" class="form-control" id="txtfechabaja" value="">
                    </div>

                    @error('txtfechabaja')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una fecha valida</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="txtcuenta">Cuenta para deposito:</label>
                        <input type="text" name="txtcuenta" class="form-control" id="txtcuenta" value="">
                    </div>

                    @error('txtcuenta')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Debe ingresar una cuenta</div>
                    @enderror
                </div>

            </div>
            <!-- fin línea-->

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="txtarea">Sede asignada:</label>
                        <select name="txtarea" id="txtarea" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($headquarter as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcion }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtarea')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una sede</div>
                    @enderror
                </div>

                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="txtcentro">Centro de costo asignado:</label>
                        <select name="txtcentro" id="txtcentro" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($centro as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcioncecos }} - {{ $item->subcentrocosto }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtcentro')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una sede</div>
                    @enderror
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="txtsalario">Salario mensual (Q - Quetzales):</label>
                        <input type="number" name="txtsalario" class="form-control" id="txtsalario" value="2704.35" step="any">
                    </div>

                    @error('txtsalario')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un salario valido</div>
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