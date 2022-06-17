@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
<h1>Creación de centros de costo nivel 2</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_subcostcenter') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtcentro">Centro de costo nivel 1:</label>
                        <select name="txtcentro" id="txtcentro" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($centros1 as $item)

                            <option value="{{ $item->id }}">
                                {{ $item->descripcioncecos }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtcentro')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un centro de costo</div>
                    @enderror
                </div>


                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="txtsubcentro">Descripción del centro de costo:</label>
                        <input type="text" name="txtsubcentro" class="form-control" id="txtsubcentro" value="" placeholder="Ingresa un valor">
                    </div>

                    @error('txtsubcentro')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese una descripción válida</div>
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