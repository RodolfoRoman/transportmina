<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = DB::table('orders')
            ->select(
                'orders.id',
                'orders.fecha_pedido',
                'orders.cantidad',
                'directories.nombres',
                'directories.apellidos',
                'headquarters.descripcion as area',
                'products.descripcion as producto',
                'measures.unidadmedida',
                'orders.estado'
            )
            ->join('directories', 'directories.id', '=', 'orders.cliente_id')
            ->join('headquarters', 'headquarters.id', '=', 'orders.area_id')
            ->join('products', 'products.id', '=', 'orders.producto_id')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('orders.estado', '<>', 'Inactivo')
            ->orderBy('orders.id', 'ASC')
            ->get();
        return view('order.ListOrder', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('products.family_id', '=', '1', 'and', 'products.estado', '=', 'Activo')
            ->orderBy('products.id', 'ASC')
            ->get();

        $cliente = DB::table('directories')
            ->select('directories.id', 'directories.nombres', 'directories.apellidos')
            ->where('directories.directorytipes_id', '=', '2', 'and', 'directories.estado', '=', 'Activo')
            ->orderBy('directories.id', 'ASC')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->orderBy('headquarters.id', 'ASC')
            ->get();

        return view('order.CreateOrder', compact('producto', 'cliente', 'area'));
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
            'txtcliente' => 'required'

        ]);

        $nuevoRegistro = new Order();

        $nuevoRegistro->fecha_pedido = $request->txtfecha;
        $nuevoRegistro->cliente_id = $request->txtcliente;
        $nuevoRegistro->area_id = $request->txtarea;
        $nuevoRegistro->producto_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, $id)
    {
        $orden = DB::table('orders')
            ->select('orders.*', 'directories.nombres', 'directories.apellidos', 'headquarters.descripcion as area', 'products.descripcion as producto', 'measures.unidadmedida')
            ->join('directories', 'directories.id', '=', 'orders.cliente_id')
            ->join('headquarters', 'headquarters.id', '=', 'orders.area_id')
            ->join('products', 'products.id', '=', 'orders.producto_id')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('orders.id', '=', $id)
            ->orderBy('orders.id', 'ASC')
            ->get();


        $productos = DB::table('products')
            ->select('products.id', 'products.descripcion', 'measures.unidadmedida')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('products.family_id', '=', '1', 'and', 'products.estado', '=', 'Activo')
            ->orderBy('products.id', 'ASC')
            ->get();

        $cliente = DB::table('directories')
            ->select('directories.id', 'directories.nombres', 'directories.apellidos')
            ->where('directories.directorytipes_id', '=', '2', 'and', 'directories.estado', '=', 'Activo')
            ->orderBy('directories.id', 'ASC')
            ->get();

        $area = DB::table('headquarters')
            ->select('headquarters.id', 'headquarters.descripcion')
            ->where('headquarters.estado', '=', 'Activo')
            ->orderBy('headquarters.id', 'ASC')
            ->get();
        return view('order.EditOrder', compact('orden', 'productos', 'cliente', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtarea' => 'required',
            'txtproducto' => 'required',
            'txtcantidad' => 'required|numeric',
            'txtcliente' => 'required',
            'txtestado' => 'required'

        ]);

        $nuevoRegistro = Order::findOrFail($id);

        $nuevoRegistro->fecha_pedido = $request->txtfecha;
        $nuevoRegistro->cliente_id = $request->txtcliente;
        $nuevoRegistro->area_id = $request->txtarea;
        $nuevoRegistro->producto_id = $request->txtproducto;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->estado = $request->txtestado;
        $nuevoRegistro->save();
        return redirect()->route('list_order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, $id)
    {
        $nuevoRegistro = Order::findOrFail($id);

        $nuevoRegistro->estado = "Inactivo";
        $nuevoRegistro->save();
        return redirect()->route('list_order');
    }
}
