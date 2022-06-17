<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = DB::table('employees')
            ->select(
                'employees.id',
                'employees.directory_id',
                'employees.salario',
                'directories.nombres',
                'directories.apellidos',
                'directories.dpi'
            )
            ->join('directories', 'directories.id', '=', 'employees.directory_id')
            ->where('employees.estado', '<>', 'Eliminado')
            ->orderBy('employees.id', 'ASC')
            ->get();
        return view('employee.ListEmployee', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directorio = DB::table('directories')
            ->select(
                'directories.id',
                'directories.nombres',
                'directories.apellidos',
                'directories.dpi'
            )
            ->where('directories.directorytipes_id', '=', '3', 'and', 'directories.estado', '<>', 'Inactivo')
            ->orderBy('directories.id', 'ASC')
            ->get();


            $centro = DB::table('sub_costcenters')
            ->select(
                'sub_costcenters.id',
                'sub_costcenters.subcentrocosto',
                'costcenters.descripcioncecos',               

            )
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '<>', 'Eliminado')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $headquarter = DB::table('headquarters')
            ->select('id', 'descripcion')
            ->where('estado', '=', 'Activo')
            ->get();
        return view('employee.CreateEmployee', compact('directorio', 'headquarter','centro'));
        //return view('prueba', compact('directorio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtdirectorio' => 'required',
            'txtfechainicio' => 'required',
            'txtestado' => 'required',
            'txtfechabaja' => 'date',
            'txtarea' => 'required',
            'txtcuenta' => 'required',
            'txtcentro' => 'required',
            'txtsalario' => 'required'
        ]);

        $nuevoRegistro = new Employee();

        $nuevoRegistro->fecha_inicio = $request->txtfechainicio;
        $nuevoRegistro->fecha_baja = $request->txtfechabaja;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->area_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->salario = $request->txtsalario;
        $nuevoRegistro->cuenta_deposito = $request->txtcuenta;
        $nuevoRegistro->estado = $request->txtestado;
        $nuevoRegistro->save();
        return redirect()->route('list_employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, $id)
    {

        $empleado = DB::table('employees')
            ->select(
                'employees.id',
                'employees.fecha_inicio',
                'employees.directory_id',
                'employees.estado',
                'employees.salario',
                'employees.fecha_baja',
                'employees.cuenta_deposito',
                'directories.nombres',
                'directories.apellidos',
                'headquarters.id as id_headquarters',
                'headquarters.descripcion',
                'sub_costcenters.id as id_subcost',
                'sub_costcenters.subcentrocosto',
                'costcenters.descripcioncecos',
                'directories.dpi'
            )
            ->join('directories', 'directories.id', '=', 'employees.directory_id')
            ->join('sub_costcenters', 'sub_costcenters.id', '=', 'employees.costcenter_id')
            ->join('headquarters', 'headquarters.id', '=', 'employees.area_id')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('employees.id', '=', $id)
            ->get();


        $directorio = DB::table('directories')
            ->select(
                'directories.id',
                'directories.nombres',
                'directories.apellidos',
                'directories.dpi'
            )
            ->where('directories.directorytipes_id', '=', '3', 'and', 'directories.estado', '<>', 'Inactivo')
            ->orderBy('directories.id', 'ASC')
            ->get();


            $centro = DB::table('sub_costcenters')
            ->select(
                'sub_costcenters.id',
                'sub_costcenters.subcentrocosto',
                'costcenters.descripcioncecos',               

            )
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '<>', 'Inactivo')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $headquarter = DB::table('headquarters')
            ->select('id', 'descripcion')
            ->where('estado', '=', 'Activo')
            ->get();

            return view('employee.EditEmployee', compact('directorio', 'headquarter','centro','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtdirectorio' => 'required',
            'txtfechainicio' => 'required',
            'txtestado' => 'required',
            'txtfechabaja' => 'date',
            'txtcuenta' => 'required',
            'txtarea' => 'required',
            'txtcentro' => 'required',
            'txtsalario' => 'required'
        ]);

        $nuevoRegistro = Employee::findOrFail($id);

        $nuevoRegistro->fecha_inicio = $request->txtfechainicio;
        $nuevoRegistro->fecha_baja = $request->txtfechabaja;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->area_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->salario = $request->txtsalario;
        $nuevoRegistro->cuenta_deposito = $request->txtcuenta;
        $nuevoRegistro->estado = $request->txtestado;
        $nuevoRegistro->save();
        return redirect()->route('list_employee');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,$id)
    {
        $nuevoRegistro = Employee::findOrFail($id);

        $nuevoRegistro->estado = "Eliminado";
        $nuevoRegistro->save();
        return redirect()->route('list_employee');
    }
}
