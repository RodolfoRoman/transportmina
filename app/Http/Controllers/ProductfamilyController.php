<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Productfamily;

class ProductfamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productfamily = DB::table('productfamilies')
                    ->select('id','descripcionfamilia')
                    ->where('productfamilies.estado','Activo')
                    ->orderBy('productfamilies.id','ASC')
                    ->get();
        return view('productfamily.ListProductFamily', compact('productfamily'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productfamily.CreateProductFamily');
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
            'txtdescripcionfamilia' => 'required',
        ]);

        $nuevoRegistro = new Productfamily();

        $nuevoRegistro->descripcionfamilia = $request->txtdescripcionfamilia;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_productfamily');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $familia = DB::table('productfamilies')
            ->select('productfamilies.id', 'productfamilies.descripcionfamilia')
            ->where('productfamilies.id', $id)
            ->get();

            return view('productfamily.EditProductFamily', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtfamiliaproducto' => 'required',
        ]);

        $nuevoRegistro = Productfamily::findOrFail($id);
        $nuevoRegistro->descripcionfamilia = $request->txtfamiliaproducto;

        $nuevoRegistro->save();
        return redirect()->route('list_productfamily');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nuevoRegistro = Productfamily::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();
        return redirect()->route('list_productfamily');
    }
}
