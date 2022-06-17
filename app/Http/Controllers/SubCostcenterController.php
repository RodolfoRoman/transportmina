<?php

namespace App\Http\Controllers;

use App\Models\SubCostcenter;
use App\Models\Costcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCostcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcentros = DB::table('sub_costcenters')
            ->select('sub_costcenters.*', 'costcenters.id as id_center', 'costcenters.descripcioncecos')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', 'Activo')
            ->orderBy('sub_costcenters.id', 'ASC')
            ->get();
        return view('subcostcenter.ListSubcostcenter', compact('subcentros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros1 = Costcenter::get()
            ->where('estado', '=', 'Activo');
        return view('subcostcenter.CreateSubcostcenter', compact('centros1'));
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
            'txtcentro' => 'required',
            'txtsubcentro' => 'required',
        ]);

        $nuevoRegistro = new SubCostcenter();

        $nuevoRegistro->subcentrocosto = $request->txtsubcentro;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_subcostcenter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCostcenter  $subCostcenter
     * @return \Illuminate\Http\Response
     */
    public function show(SubCostcenter $subCostcenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCostcenter  $subCostcenter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $subcentro = DB::table('sub_costcenters')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->select('sub_costcenters.*', 'costcenters.id as id_costo', 'costcenters.descripcioncecos')
            ->where('sub_costcenters.id', $id)
            ->get();

        $centro = DB::table('costcenters')
            ->select('descripcioncecos', 'costcenters.id')
            ->get();

        return view('subcostcenter.EditSubcostcenter', compact('subcentro', 'centro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCostcenter  $subCostcenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtcentro' => 'required',
            'txtsubcentro' => 'required',
        ]);

        $nuevoRegistro = SubCostcenter::findOrFail($id);

        $nuevoRegistro->subcentrocosto = $request->txtsubcentro;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->save();
        return redirect()->route('list_subcostcenter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCostcenter  $subCostcenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $nuevoRegistro = SubCostcenter::findOrFail($id);

        $nuevoRegistro->estado = "Inactivo";
        $nuevoRegistro->save();
        return redirect()->route('list_subcostcenter');
    }
}
