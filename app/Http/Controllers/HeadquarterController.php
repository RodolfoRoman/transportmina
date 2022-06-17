<?php

namespace App\Http\Controllers;

use App\Models\Headquarter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadquarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headquarter = DB::table('headquarters')
            ->select('id', 'descripcion', 'direccion', 'telefono')
            ->where('estado', '=', 'Activo')
            ->get();
        return view('headquarter.ListHeadquarter', compact('headquarter'));
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
     * @param  \App\Models\Headquarter  $headquarter
     * @return \Illuminate\Http\Response
     */
    public function show(Headquarter $headquarter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Headquarter  $headquarter
     * @return \Illuminate\Http\Response
     */
    public function edit(Headquarter $headquarter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Headquarter  $headquarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headquarter $headquarter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Headquarter  $headquarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Headquarter $headquarter)
    {
        //
    }
}
