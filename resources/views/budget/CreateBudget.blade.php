@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
<h1>Asignación de presupuesto</h1>
@stop

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('content')



<div class="card card-danger card-outline">

    <div class="card-body">
        <div class="row">





        </div>
        <!-- fin de línea-->
    </div>


</div>

<div class="card card-danger card-outline">
    <div class="card-body">
        <form action="{{ route('save_budget') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtid">Id Mes:</label>
                        <input type="number" name="txtid" class="form-control" id="txtid" value="{{$mes[0]->id}}" placeholder="Ingresa un valor" readonly="true">

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtanio">Año contable:</label>
                        <input type="number" name="txtanio" class="form-control" id="txtanio" value="{{$mes[0]->anio}}" placeholder="Ingresa un valor" readonly="true">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="txtmes">Mes contable:</label>
                        <input type="text" name="txtmes" class="form-control" id="txtmes" value="{{$mes[0]->mes}}" placeholder="Ingresa un valor" readonly="true">
                    </div>
                </div>

            </div>



            <!-- fin línea-->
            <div class="row">

                <div class="col-sm-6">
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



                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtactividad">Seleccione una actividad:</label>
                        <select name="txtactividad" id="txtactividad" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($actividades as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->actividad }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @error('txtactividad')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione una actividad:</div>
                    @enderror
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtcecos">Centro de costo Nv 1:</label>
                        <select name="txtcecos" id="txtcecos" class="form-control">
                            <option value=""> Seleccione </option>
                            @foreach ($centros as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->descripcioncecos }} - {{ $item->subcentrocosto }}
                            </option>
                            @endforeach


                        </select>
                    </div>

                    @error('txtcecos')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un centro de costo</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="txtmonto">Monto presupuestado: (Q - Quetzales)</label>
                        <input type="number" name="txtmonto" class="form-control" id="txtmonto" value="0" placeholder="Ingresa un valor" step="any">
                    </div>

                    @error('txtmonto')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Ingrese un monto</div>
                    @enderror
                </div>




            </div>
            <!-- fin línea-->

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="txtdescripcion">Detalle:</label>
                        <input type="text" name="txtdescripcion" class="form-control" id="txtdescripcion" value="" placeholder="Ingresa un valor">
                    </div>

                    @error('txtdescripcion')
                    <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Escriba un detalle</div>
                    @enderror
                </div>

            </div>
            <div class="card-body text-center">
                <div class="card-boody">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-plus-circle"></i>Nueva asignación</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="card card-danger card-outline">

    <div class="card-body">
        <label for="">Presupuesto asignado a este mes:</label>

        <table id="listdirectory" class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>Id</th>
                    <th>Area</th>
                    <th>CeCos Nv. 1</th>
                    <th>CeCos Nv. 2</th>
                    <th>Actividad</th>
                    <th>Monto presupuestado</th>
                    <th>Descripción</th>
                    <th>Administración</th>
                </tr>
            </thead>
            <tbody>
                @foreach($presupuesto as $item)
                <tr>
                    <td>{{$item->id_bud}}</td>
                    <td>{{$item->descrip_area}}</td>
                    <td>{{$item->descripcioncecos}}</td>
                    <td>{{$item->subcentrocosto}}</td>
                    <td>{{$item->actividad}}</td>
                    <td>Q. {{$item->montoq}}</td>
                    <td>{{$item->descrip_bud}}</td>
                    <td>
                        <form action="{{ route('destroy_budget',$item->id_bud) }}" method="POST" title="Eliminar registro" style="display: inline-block;" onsubmit="return confirm('¿Seguro que desea eliminar?')">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-danger fas fa-trash-alt " type="submit"></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


<script src="public/js/elementos.js"></script>

@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop