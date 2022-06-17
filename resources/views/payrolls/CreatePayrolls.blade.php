@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<h1>Creación de empleados</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <form action="{{ route('save_payroll') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">


            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtmes">Directorio:</label>
                        <select name="txtmes" id="txtmes" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($mes as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->anio }} - {{ $item->mes }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtmes')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un contribuyente</div>
                    @enderror
                </div>
            </div>
            <!-- fin línea-->


            <div class="card-boody">
                <button type="submit" class="btn btn-primary swalDefaultSuccess"><i class="fas fa-save"></i> Crear planillas</button>

            </div>
        </div>


    </form>

</div>

@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop