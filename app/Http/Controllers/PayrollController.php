<?php

namespace App\Http\Controllers;

use App\Exports\PayrollExport;
use App\Models\Payroll;
use App\Models\PayrollDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planillas = DB::table('payrolls')
            ->select(
                'payrolls.id',
                'years.anio',
                'months.mes'
            )
            ->join('months', 'months.id', '=', 'payrolls.month_id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->orderBy('payrolls.id', 'ASC')
            ->get();
        return view('payrolls.ListPayRolls', compact('planillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mes = DB::table('months')
            ->select(
                'months.id',
                'months.mes',
                'years.anio'
            )
            ->join('years', 'years.id', '=', 'months.year_id')
            ->where('months.estado', '=', 'Activo')
            ->orderBy('months.id', 'ASC')
            ->get();

        return view('payrolls.CreatePayRolls', compact('mes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleados = DB::table('employees')
            ->select(
                'employees.id',
                'employees.fecha_inicio',
                'employees.fecha_baja',
                'employees.area_id',
                'employees.costcenter_id',
                'employees.salario',
                'employees.cuenta_deposito',
            )
            ->where('employees.estado', '=', 'Activo')
            ->orderBy('employees.id', 'ASC')
            ->get();

            $nuevaPlanilla = new Payroll();
            $nuevaPlanilla->month_id = $request->txtmes;
            $nuevaPlanilla->save();

            $variable = $nuevaPlanilla->id;

            
        foreach ($empleados as $item) {

            if ($item->fecha_baja <> null) {
                $nuevoRegistro = new PayrollDetail(); 
                $nuevoRegistro->payroll_id = $variable;
                $nuevoRegistro->employee_id = $item->id;
                $nuevoRegistro->headquarter_id = $item->area_id;
                $nuevoRegistro->costcenter_id = $item->costcenter_id;
                $nuevoRegistro->salario = $item->salario;
                $nuevoRegistro->descuento = 0;
                $nuevoRegistro->extras = 0;
                $nuevoRegistro->save();

            }
        }
        

        return redirect()->route('list_payroll');
    
        //return view('prueba', compact('variable'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }
    public function download($id)
    {
        /*$planillas = DB::table('payroll_details')
            ->select(
                'payroll_details.id',
                'years.anio',
                'months.mes',
                'directories.nombres',
                'directories.apellidos',
                'employees.cuenta_deposito',
                'payroll_details.salario',
                'payroll_details.descuento',
                'payroll_details.extras',
            )
            ->join('payrolls', 'payrolls.id', '=', 'payroll_details.payroll_id')
            ->join('months', 'months.id', '=', 'payrolls.month_id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->join('employees', 'employees.id', '=', 'payroll_details.employee_id')
            ->join('directories', 'directories.id', '=', 'employees.directory_id')
            ->join('headquarters', 'headquarters.id', '=', 'payroll_details.headquarter_id')
            ->join('costcenters', 'costcenters.id', '=', 'payroll_details.costcenter_id')
            ->orderBy('payroll_details.id', 'ASC')
            ->get();
        return view('prueba', compact('planillas'));
        */

        return Excel::download(new PayrollExport($id), 'planilla.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll, $id)
    {

        $detalle = PayrollDetail::where('payroll_id','=',$id);
        $detalle->delete();
        $insti = Payroll::find($id);
        $insti->delete();        
        
        return back()->with('succes','Registro eliminado exitosamente');
        //return redirect()->route('listinstituciones');
    }
}
