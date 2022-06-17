<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInt()
    {
        $transaccion = DB::table('inventory_transactions')
            ->select(
                'inventory_transactions.id',
                'inventory_transactions.fecha_operacion',
                'inventory_transactions.cantidad',
                'products.descripcion'
            )
            ->join('products', 'products.id', '=', 'inventory_transactions.product_id')
            ->where( 'inventory_transactions.tipo_transaccion', '=', 'Ingreso', ' and', 'inventory_transactions.estado', '=', 'Activo')
            ->orderBy('inventory_transactions.id', 'ASC')
            ->get();
        return view('inventary.ListInt', compact('transaccion'));
    }

    public function indexOut()
    {
        $transaccionout = DB::table('inventory_transactions')
            ->select(
                'inventory_transactions.id',
                'inventory_transactions.fecha_operacion',
                'inventory_transactions.cantidad',
                'products.descripcion'
            )
            ->join('products', 'products.id', '=', 'inventory_transactions.product_id')
            ->where( 'inventory_transactions.tipo_transaccion', '=', 'Salida', ' and', 'inventory_transactions.estado', '=', 'Activo')
            ->orderBy('inventory_transactions.id', 'ASC')
            ->get();
        return view('inventary.ListOut', compact('transaccionout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createInt()
    {
        $actividad = DB::table('activities')
            ->select('activities.id', 'activities.actividad')
            ->where('activities.estado', '=', 'Activo')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();


        $centro = DB::table('sub_costcenters')
            ->select('sub_costcenters.id', 'costcenters.descripcioncecos', 'sub_costcenters.subcentrocosto')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '=', 'Activo')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '<>', '1', 'and', 'products.estado', '=', 'Activo')
            ->get();

        $directorio = DB::table('directories')
            ->select(
                'directories.id',
                'directories.nombres',
                'directories.apellidos',
                'directories.dpi'
            )
            ->where('directories.directorytipes_id', '=', '1', 'and', 'directories.estado', '<>', 'Inactivo')
            ->orderBy('directories.id', 'ASC')
            ->get();

        return view('inventary.CreateInt', compact('actividad', 'area', 'centro', 'producto', 'directorio'));
    }

    public function createOut()
    {
        $actividad = DB::table('activities')
            ->select('activities.id', 'activities.actividad')
            ->where('activities.estado', '=', 'Activo')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();


        $centro = DB::table('sub_costcenters')
            ->select('sub_costcenters.id', 'costcenters.descripcioncecos', 'sub_costcenters.subcentrocosto')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '=', 'Activo')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '<>', '1', 'and', 'products.estado', '=', 'Activo')
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

        return view('inventary.CreateOut', compact('actividad', 'area', 'centro', 'producto', 'directorio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInt(Request $request)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtcentro' => 'required',
            'txtactividad' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required',
            'txtprecio' => 'required',
            'txtdirectorio' => 'required'
        ]);

        $nuevoRegistro = new InventoryTransaction();

        $nuevoRegistro->fecha_operacion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->activity_id = $request->txtactividad;
        $nuevoRegistro->tipo_transaccion = "Ingreso";
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio = $request->txtprecio;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->estado = 'Activo';
        $nuevoRegistro->save();
        return redirect()->route('list_int');
    }


    public function storeOut(Request $request)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtcentro' => 'required',
            'txtactividad' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required',
            'txtprecio' => 'required',
            'txtdirectorio' => 'required'
        ]);

        $nuevoRegistro = new InventoryTransaction();

        $nuevoRegistro->fecha_operacion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->activity_id = $request->txtactividad;
        $nuevoRegistro->tipo_transaccion = "Salida";
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio = $request->txtprecio;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->estado = 'Activo';
        $nuevoRegistro->save();
        return redirect()->route('list_Out');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryTransaction  $inventoryTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryTransaction $inventoryTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryTransaction  $inventoryTransaction
     * @return \Illuminate\Http\Response
     */
    public function editInt(InventoryTransaction $inventoryTransaction, $id)
    {
        $actividad = DB::table('activities')
            ->select('activities.id', 'activities.actividad')
            ->where('activities.estado', '=', 'Activo')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();


        $centro = DB::table('sub_costcenters')
            ->select(
                'sub_costcenters.id',
                'costcenters.descripcioncecos',
                'sub_costcenters.subcentrocosto'
            )
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '=', 'Activo')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '<>', '1', 'and', 'products.estado', '=', 'Activo')
            ->get();

        $directorio = DB::table('directories')
            ->select(
                'directories.id',
                'directories.nombres',
                'directories.apellidos',
                'directories.dpi'
            )
            ->where('directories.directorytipes_id', '=', '1', 'and', 'directories.estado', '<>', 'Inactivo')
            ->orderBy('directories.id', 'ASC')
            ->get();


        $transaccion = DB::table('inventory_transactions')
            ->select(
                'inventory_transactions.id',
                'inventory_transactions.fecha_operacion',
                'inventory_transactions.headquarter_id',
                'headquarters.descripcion as area',
                'inventory_transactions.costcenter_id',
                'sub_costcenters.subcentrocosto',
                'costcenters.descripcioncecos',                
                'inventory_transactions.activity_id',
                'activities.actividad',
                'inventory_transactions.product_id',
                'products.descripcion as descprod',
                'measures.unidadmedida',
                'inventory_transactions.cantidad',
                'inventory_transactions.precio',
                'inventory_transactions.directory_id',
                'directories.nombres',
                'directories.apellidos',
                'directories.id as id_dire',
                'directories.dpi as dpi'
            )
            ->join('headquarters', 'headquarters.id', '=', 'inventory_transactions.headquarter_id')
            ->join('sub_costcenters', 'sub_costcenters.id', '=', 'inventory_transactions.costcenter_id')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->join('activities', 'activities.id', '=', 'inventory_transactions.activity_id')
            ->join('products', 'products.id', '=', 'inventory_transactions.product_id')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->join('directories', 'directories.id', '=', 'inventory_transactions.directory_id')
            ->where('inventory_transactions.id', '=', $id)
            ->orderBy('inventory_transactions.id', 'ASC')
            ->get();

        return view('inventary.EditInt', compact('actividad', 'area', 'centro', 'producto', 'directorio', 'transaccion'));
    }

    public function editOut(InventoryTransaction $inventoryTransaction, $id)
    {
        $actividad = DB::table('activities')
            ->select('activities.id', 'activities.actividad')
            ->where('activities.estado', '=', 'Activo')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->get();


        $centro = DB::table('sub_costcenters')
            ->select(
                'sub_costcenters.id',
                'costcenters.descripcioncecos',
                'sub_costcenters.subcentrocosto'
            )
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->where('sub_costcenters.estado', '=', 'Activo')
            ->orderBy('costcenters.id', 'ASC')
            ->get();

        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->where('products.family_id', '<>', '1', 'and', 'products.estado', '=', 'Activo')
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


        $transaccion = DB::table('inventory_transactions')
            ->select(
                'inventory_transactions.id',
                'inventory_transactions.fecha_operacion',
                'inventory_transactions.headquarter_id',
                'headquarters.descripcion as area',
                'inventory_transactions.costcenter_id',
                'sub_costcenters.subcentrocosto',
                'costcenters.descripcioncecos',                
                'inventory_transactions.activity_id',
                'activities.actividad',
                'inventory_transactions.product_id',
                'products.descripcion as descprod',
                'measures.unidadmedida',
                'inventory_transactions.cantidad',
                'inventory_transactions.precio',
                'inventory_transactions.directory_id',
                'directories.nombres',
                'directories.apellidos',
                'directories.id as id_dire',
                'directories.dpi as dpi'
            )
            ->join('headquarters', 'headquarters.id', '=', 'inventory_transactions.headquarter_id')
            ->join('sub_costcenters', 'sub_costcenters.id', '=', 'inventory_transactions.costcenter_id')
            ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
            ->join('activities', 'activities.id', '=', 'inventory_transactions.activity_id')
            ->join('products', 'products.id', '=', 'inventory_transactions.product_id')
            ->join('measures', 'measures.id', '=', 'products.measure_id')
            ->join('directories', 'directories.id', '=', 'inventory_transactions.directory_id')
            ->where('inventory_transactions.id', '=', $id)
            ->orderBy('inventory_transactions.id', 'ASC')
            ->get();

        return view('inventary.EditOut', compact('actividad', 'area', 'centro', 'producto', 'directorio', 'transaccion'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryTransaction  $inventoryTransaction
     * @return \Illuminate\Http\Response
     */
    public function updateInt(Request $request, $id)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtcentro' => 'required',
            'txtactividad' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required',
            'txtprecio' => 'required',
            'txtdirectorio' => 'required'
        ]);

        $nuevoRegistro = InventoryTransaction::findOrFail($id);
        $nuevoRegistro->fecha_operacion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->activity_id = $request->txtactividad;
        $nuevoRegistro->tipo_transaccion = "Ingreso";
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio = $request->txtprecio;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->estado = 'Activo';
        $nuevoRegistro->save();
        return redirect()->route('list_int');
    }

    public function updateOut(Request $request, $id)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtcentro' => 'required',
            'txtactividad' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required',
            'txtprecio' => 'required',
            'txtdirectorio' => 'required'
        ]);

        $nuevoRegistro = InventoryTransaction::findOrFail($id);
        $nuevoRegistro->fecha_operacion = $request->txtfecha;
        $nuevoRegistro->headquarter_id = $request->txtarea;
        $nuevoRegistro->costcenter_id = $request->txtcentro;
        $nuevoRegistro->activity_id = $request->txtactividad;
        $nuevoRegistro->tipo_transaccion = "Salida";
        $nuevoRegistro->product_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio = $request->txtprecio;
        $nuevoRegistro->directory_id = $request->txtdirectorio;
        $nuevoRegistro->estado = 'Activo';
        $nuevoRegistro->save();
        return redirect()->route('list_out');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryTransaction  $inventoryTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroyInt(InventoryTransaction $inventoryTransaction, $id)
    {
        $nuevoRegistro = InventoryTransaction::findOrFail($id);

        $nuevoRegistro->estado = "Inactivo";
        $nuevoRegistro->save();
        return redirect()->route('list_int');
    }
}
