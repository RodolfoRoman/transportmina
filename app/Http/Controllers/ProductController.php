<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\Product;
use App\Models\Productfamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->join('productfamilies', 'productfamilies.id', '=', 'products.family_id')
            ->select('products.*', 'productfamilies.descripcionfamilia as fami', 'measures.unidadmedida as medi')
            ->where('products.estado','Activo')
            ->orderBy('products.id','ASC')
            ->get();
        return view('product.ListProduct', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia = Productfamily::get();
        $umedida = Measure::get();

        return view('product.CreateProduct', compact('familia', 'umedida'));
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
            'txtdescripcion' => 'required',
            'txtunidadmedida' => 'required',
            'txtfamilia' => 'required'
        ]);

        $nuevoRegistro = new Product();

        $nuevoRegistro->codigo = $request->txtcod;
        $nuevoRegistro->descripcion = $request->txtdescripcion;
        $nuevoRegistro->measure_id = $request->txtunidadmedida;
        $nuevoRegistro->family_id = $request->txtfamilia;
        $nuevoRegistro->stock_minimo = $request->txtminimo;
        $nuevoRegistro->stock_maximo = $request->txtmaximo;
        $nuevoRegistro->descripcion_larga = $request->txtobservaciones;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $articulo = DB::table('products')
        ->join('measures', 'measures.id', '=', 'products.measure_id')
        ->join('productfamilies','productfamilies.id','=','products.family_id')
        ->select('products.*', 'productfamilies.descripcionfamilia', 'measures.unidadmedida','measures.id as id_measures','productfamilies.id as id_productfamilies')
        ->where('products.id', $id)
        ->get();

        $unidad = DB::table('measures')
            ->select('id', 'unidadmedida')
            ->where('estado','=','Activo')
            ->get();

        $familia = DB::table('productfamilies')
            ->select('id', 'descripcionfamilia')
            ->where('estado','=','Activo')
            ->get();

        return view('product.EditProduct', compact('articulo', 'unidad','familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtdescripcion' => 'required',
            'txtunidadmedida' => 'required',
            'txtfamilia' => 'required'
        ]);

        $nuevoRegistro = Product::findOrFail($id);

        $nuevoRegistro->codigo = $request->txtcod;
        $nuevoRegistro->descripcion = $request->txtdescripcion;
        $nuevoRegistro->measure_id = $request->txtunidadmedida;
        $nuevoRegistro->family_id = $request->txtfamilia;
        $nuevoRegistro->stock_minimo = $request->txtminimo;
        $nuevoRegistro->stock_maximo = $request->txtmaximo;
        $nuevoRegistro->descripcion_larga = $request->txtobservaciones;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $nuevoRegistro = Product::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();
        return redirect()->route('list_product');
    
    }
}
