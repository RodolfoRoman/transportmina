<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use PDF;
//use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = DB::table('sales')
            ->select(
                'headquarters.descripcion as area',
                'sales.id as venta',
                'sales.fecha_venta',
                'orders.id as pedido',
                'orders.fecha_pedido',
                'directories.nombres',
                'directories.apellidos',
                'products.descripcion as producto',
                'orders.cantidad as cant_pedido',
                'sales.cantidad as cant_venta',
                'sales.total_iva',
                'sales.total_venta',
                'measures.unidadmedida'
            )
            ->join('orders', 'sales.order_id', '=', 'orders.id')
            ->join('directories', 'directories.id', '=', 'orders.cliente_id')
            ->join('headquarters', 'headquarters.id', '=', 'orders.area_id')
            ->join('products', 'products.id', '=', 'orders.producto_id')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('sales.estado', '<>', 'Inactivo')
            ->orderBy('orders.id', 'ASC')
            ->get();
        return view('sale.ListSale', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            ->where('orders.estado', 'Activo')
            ->orderBy('orders.id', 'ASC')
            ->get();
        return view('sale.CreateSale', compact('ordenes'));
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
            'txtpedido' => 'required',
            'txtiva' => 'required',
            'txtcantidad' => 'required|numeric',
            'txtprecioventa' => 'required'
        ]);

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $certi = substr(str_shuffle($permitted_chars), 0, 15);
        $factura = mt_rand(1000, 9999);

        //$total= $request->txtprecioventa * $request->txtcantidad;
        $totalsiniva = round(($request->txtprecioventa * $request->txtcantidad) / 1.12, 5);
        $iva = round(($request->txtprecioventa * $request->txtcantidad) - $totalsiniva, 5);



        $nuevoRegistro = new Sale();

        $nuevoRegistro->fecha_venta = $request->txtfecha;
        $nuevoRegistro->order_id = $request->txtpedido;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio_venta = $request->txtprecioventa;
        $nuevoRegistro->total_iva = $iva;
        $nuevoRegistro->total_venta = $totalsiniva;
        $nuevoRegistro->factura = $factura;
        $nuevoRegistro->certificacion = $certi;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_sale');

        //return view('prueba', compact('certi','factura','totalsiniva','total','iva'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale, $id)
    {
        $venta = DB::table('sales')
            ->select(
                'headquarters.descripcion as area',
                'sales.id as venta',
                'sales.fecha_venta',
                'sales.order_id',
                'orders.fecha_pedido',
                'directories.nombres',
                'directories.apellidos',
                'products.descripcion as producto',
                'orders.cantidad as cant_pedido',
                'sales.cantidad as cant_venta',
                'sales.precio_venta',
                'sales.total_iva',
                'sales.total_venta',
                'measures.unidadmedida'
            )
            ->join('orders', 'sales.order_id', '=', 'orders.id')
            ->join('directories', 'directories.id', '=', 'orders.cliente_id')
            ->join('headquarters', 'headquarters.id', '=', 'orders.area_id')
            ->join('products', 'products.id', '=', 'orders.producto_id')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('sales.id', '=', $id)
            ->get();


        $pedidos = DB::table('orders')
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
            ->where('orders.estado', 'Activo')
            ->orderBy('orders.id', 'ASC')
            ->get();
        return view('sale.EditSale', compact('venta','pedidos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtfecha' => 'required|date',
            'txtpedido' => 'required',
            'txtiva' => 'required',
            'txtcantidad' => 'required|numeric',
            'txtprecioventa' => 'required'
        ]);

        //$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        //$certi = substr(str_shuffle($permitted_chars), 0, 15);
        //$factura = mt_rand(1000, 9999);

        //$total= $request->txtprecioventa * $request->txtcantidad;
        $totalsiniva = round(($request->txtprecioventa * $request->txtcantidad) / 1.12, 5);
        $iva = round(($request->txtprecioventa * $request->txtcantidad) - $totalsiniva, 5);


        $nuevoRegistro = Sale::findOrFail($id);

        $nuevoRegistro->fecha_venta = $request->txtfecha;
        $nuevoRegistro->order_id = $request->txtpedido;
        $nuevoRegistro->cantidad = $request->txtcantidad;
        $nuevoRegistro->precio_venta = $request->txtprecioventa;
        $nuevoRegistro->total_iva = $iva;
        $nuevoRegistro->total_venta = $totalsiniva;
        //$nuevoRegistro->factura = $factura;
        //$nuevoRegistro->certificacion = $certi;
        //$nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_sale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale,$id)
    {
        $nuevoRegistro = Sale::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();
        return redirect()->route('list_sale');
    }

    public function invoice(Request $request, $id)
    {
        $ventas = DB::table('sales')
            ->select(
                'headquarters.descripcion as area',
                'sales.id as venta',
                'sales.fecha_venta',
                'sales.factura',
                'sales.certificacion',
                'orders.id as pedido',
                'orders.fecha_pedido',
                'directories.nombres',
                'directories.apellidos',
                'directories.nit',
                'directories.direccion',
                'products.descripcion as producto',
                'orders.cantidad as cant_pedido',
                'sales.cantidad as cant_venta',
                'sales.total_iva',
                'sales.precio_venta',
                'sales.total_venta',
                'measures.unidadmedida'
            )
            ->join('orders', 'sales.order_id', '=', 'orders.id')
            ->join('directories', 'directories.id', '=', 'orders.cliente_id')
            ->join('headquarters', 'headquarters.id', '=', 'orders.area_id')
            ->join('products', 'products.id', '=', 'orders.producto_id')
            ->join('measures', 'products.measure_id', '=', 'measures.id')
            ->where('sales.id','=', $id)
            ->get();


            
            $pdf = PDF::loadView('invoice.invoice',compact('ventas'));
            return $pdf->stream();            
        //return view('invoice.invoice', compact('ventas'));
    }



}
