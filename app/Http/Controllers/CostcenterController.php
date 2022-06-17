<?php

namespace App\Http\Controllers;

use App\Models\Costcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cecos = DB::table('costcenters')
        ->select('id','descripcioncecos')
        ->where('estado','=','Activo')
        ->get();
        return view('costcenter.ListCostcenter', compact('cecos'));
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
     * @param  \App\Models\Costcenter  $costcenter
     * @return \Illuminate\Http\Response
     */
    public function show(Costcenter $costcenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costcenter  $costcenter
     * @return \Illuminate\Http\Response
     */
    public function edit(Costcenter $costcenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costcenter  $costcenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costcenter $costcenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costcenter  $costcenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costcenter $costcenter)
    {
        //
    }
}
