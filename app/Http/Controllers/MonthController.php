<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meses = DB::table('months')
            ->select('months.mes', 'years.anio', 'months.id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->where('months.estado', 'Activo')
            ->orderBy('months.id', 'ASC')
            ->get();

        return view('month.ListMonth', compact('meses'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(Month $month)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit(Month $month)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Month $month)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(Month $month)
    {
        //
    }

    public function presupuestomes(Month $month, $id)
    {

        $mes = DB::table('months')
            ->select('months.mes', 'years.anio', 'months.id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->where('months.id', '=', $id)
            ->get();


        $presupuesto = DB::table('budgets')
            ->select('budgets.id as id_bud', 'headquarters.descripcion as descrip_area', 'costcenters.descripcioncecos', 'sub_costcenters.subcentrocosto', 'activities.actividad', 'budgets.monto_presupuesto as montoq', 'budgets.descripcion as descrip_bud')
            ->join('sub_costcenters', 'sub_costcenters.id', '=', 'budgets.costcenter_id')
            ->join('costcenters', 'sub_costcenters.costcenter_id', '=', 'costcenters.id')
            ->join('activities', 'activities.id', '=', 'budgets.activity_id')
            ->join('headquarters', 'headquarters.id', '=', 'budgets.headquarter_id')
            //->where('budgets.month_id', '=', $id, 'and','budgets.estado','=','Activo')
            ->where('budgets.estado','=','Activo',' And', 'budgets.month_id', '=', $id, )
            ->orderBy('headquarters.id')
            ->get();

        $actividades = DB::table('activities')
            ->select('activities.id', 'activities.actividad')
            ->where('activities.estado', '=', 'Activo')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();


        $centros = DB::table('sub_costcenters')
            ->select('sub_costcenters.id', 'costcenters.descripcioncecos','sub_costcenters.subcentrocosto')
            ->join('costcenters','costcenters.id','=','sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '=', 'Activo')
            ->orderBy('costcenters.id','ASC')
            ->get();



        return view('budget/CreateBudget', compact('mes', 'presupuesto','actividades','area','centros'));
    }

    /*
    public $selectedSubCentro =null;
    public $subcentro = null;

    public function updatedselectedCentro($centro_id){

        $subcentro = DB::table('sub_costcenters')
            ->select('sub_costcenters.id', 'sub_costcenters.subcentrocosto')
            ->where('sub_costcenters.estado', '=', 'Activo', 'and','sub_costcenters.costcenter_id','=',$centro_id)
            ->get();


            

    }
    */
}
