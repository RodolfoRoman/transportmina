<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contollers\MonthController;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           
            'txtarea' => 'required',
            'txtactividad' => 'required',
            'txtmonto' => 'required',
            'txtcecos' => 'required',
            'txtdescripcion' => 'required'
        ]);

        $nuevoRegistro = new Budget();

        $nuevoRegistro->month_id = $request->txtid;
        $nuevoRegistro->costcenter_id = $request->txtcecos;
        $nuevoRegistro->activity_id = $request->txtactividad;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->monto_presupuesto = $request->txtmonto;
        $nuevoRegistro->descripcion = $request->txtdescripcion;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();

        $meses = DB::table('months')
            ->select('months.mes', 'years.anio', 'months.id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->where('months.estado', 'Activo')
            ->orderBy('months.id', 'ASC') 
            ->get();

        return view('month.ListMonth', compact('meses'));
        //return view('budget.CreateBudget',$request->txtid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget, $id)
    {
        $nuevoRegistro = Budget::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();

        $meses = DB::table('months')
        ->select('months.mes', 'years.anio', 'months.id')
        ->join('years', 'years.id', '=', 'months.year_id')
        ->where('months.estado', 'Activo')
        ->orderBy('months.id', 'ASC')
        ->get();
        return redirect()->route('list_month', compact('meses'));
    }
}
