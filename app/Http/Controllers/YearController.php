<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreYear;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anios = DB::table('years')
            ->select('years.*')
            ->where('years.estado', 'Activo')
            ->orderBy('years.id', 'ASC')
            ->get();
        return view('year.ListYear', compact('anios'));
    }

    /**
     * Show the form for creating a new  resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('year.CreateYear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYear $request)
    {
        /*$cantidad = Year::count('id')
            ->where('anio', $request->txtanio)
            ->get();

        if ($cantidad>0) {
            
            return view('prueba', compact('cantidad'));


        } else {*/
            $nuevoRegistro = new Year();

            $nuevoRegistro->anio = $request->txtanio;
            $nuevoRegistro->estado = "Activo";
            $nuevoRegistro->save();



            /*$id_anio = DB::table('years')
            ->select('years.id')
            ->where('years.anio', $request->txtanio)
            ->first();
            */

            $id_anio = Year::where('anio','=',$request->txtanio,'and','estado','Acitivo')->first();


            
            $meses= array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

            for($i = 0; $i<12; $i++){
                $nuevomes = new Month();
                $nuevomes->year_id = $id_anio->id;
                $nuevomes->mes = $meses[$i];
                $nuevomes->estado = "Activo";
                $nuevomes->save();
            }
            

            return redirect()->route('list_year');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year, $id)
    {
        $nuevoRegistro = Year::findOrFail($id);
        $nuevoRegistro->estado = "Inactivo";
        $nuevoRegistro->save();

        //$meses= array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        //for($i = 0; $i<12; $i++){
            //$nuevomes =  Month::get('year_id','=',31);
            //$nuevomes->estado = "Inactivo";
            //$nuevomes->save();
            Month::where("year_id","$id")->update(["Estado"=>"Inactivo"]);
        //}
        return redirect()->route('list_year');
    }
}
