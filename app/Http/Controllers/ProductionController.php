<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produccion = DB::table('productions')
            ->select(
                'productions.id',
                'productions.fecha_produccion',
                'productions.cantidad_produccion',
                'products.codigo as cod_prod',
                'products.descripcion as producto',
                'headquarters.descripcion as area',
                'measures.unidadmedida'
            )
            ->join('products', 'products.id', 'productions.product_id')
            ->join('headquarters', 'headquarters.id', 'productions.headquarter_id')
            ->join('measures', 'measures.id', 'products.measure_id')
            ->where('productions.estado', 'Activo')
            ->orderBy('productions.fecha_produccion', 'ASC')
            ->get();
        return view('production.ListProduction', compact('produccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '=', '1', 'and', 'products.estado', '=', 'Activo')
            ->get();

        return view('production/CreateProduction', compact('area', 'producto'));
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
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required|numeric',
            'txtobservaciones' => 'required'

        ]);

        $nuevoRegistro = new Production();

        $nuevoRegistro->fecha_produccion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad_produccion = $request->txtcantidad;
        $nuevoRegistro->observaciones = $request->txtobservaciones;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_production');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production, $id)
    {
        $producion = DB::table('productions')
            ->select(
                'productions.id',
                'productions.fecha_produccion',
                'productions.cantidad_produccion',
                'products.codigo as cod_prod',
                'products.id as id_prod',
                'products.descripcion as producto',
                'headquarters.descripcion as area',
                'headquarters.id as area_id',
                'measures.unidadmedida',
                'productions.observaciones',
            )
            ->join('products', 'products.id', 'productions.product_id')
            ->join('headquarters', 'headquarters.id', 'productions.headquarter_id')
            ->join('measures', 'measures.id', 'products.measure_id')
            ->where('productions.id','=',$id)
            ->orderBy('productions.fecha_produccion', 'ASC')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '=', '1', 'and', 'products.estado', '=', 'Activo')
            ->get();
        return view('production.EditProduction', compact('producion','area','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required|numeric',
            'txtobservaciones' => 'required'
        ]);

        $nuevoRegistro = Production::findOrFail($id);

        $nuevoRegistro->fecha_produccion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad_produccion = $request->txtcantidad;
        $nuevoRegistro->observaciones = $request->txtobservaciones;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_production');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production, $id)
    {
        $nuevoRegistro = Production::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();
        return redirect()->route('list_production');
    
    }
}
