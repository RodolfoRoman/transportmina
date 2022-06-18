<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\DirectoryTipe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$directory = Directory::all()->where('estado', '=', 'Activo');
        $directory = DB::table('directories')
            ->join('directorytipes', 'directorytipes.id', '=', 'directories.directorytipes_id')
            ->select('directories.*', 'directorytipes.tipodirectorio')
            ->where('directories.estado','Activo')
            ->orderBy('directories.id','ASC')
            ->get();
        return view('directory.ListDirectory', compact('directory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directorios = DirectoryTipe::get();
        return view('auxiliar.CreateDirectory', compact('directorios'));
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
            'txtapellidos' => 'required',
            'txtnombres' => 'required',
            'txtcotribuyente' => 'required',
            'txttipodir' => 'required'
        ]);

        $nuevoRegistro = new Directory();

        $nuevoRegistro->nombres = $request->txtnombres;
        $nuevoRegistro->apellidos = $request->txtapellidos;
        $nuevoRegistro->contribuyente = $request->txtcotribuyente;
        $nuevoRegistro->email = $request->txtemail;
        $nuevoRegistro->direccion = $request->txtdireccion;
        $nuevoRegistro->nit = $request->txtnit;
        $nuevoRegistro->dpi = $request->txtdpi;
        $nuevoRegistro->telefono = $request->txttelefono;
        $nuevoRegistro->directorytipes_id = $request->txttipodir;
        $nuevoRegistro->estado = "Activo";
        $nuevoRegistro->save();
        return redirect()->route('list_directory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(Directory $directory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $directorio = DB::table('directories')
            ->join('directorytipes', 'directorytipes.id', '=', 'directories.directorytipes_id')
            ->select('directories.*', 'directorytipes.tipodirectorio', 'directorytipes.id as id_tipe')
            ->where('directories.id', $id)
            ->get();

        $tipe_directory = DB::table('directorytipes')
            ->select('tipodirectorio', 'directorytipes.id')
            ->get();

        return view('directory.EditDirectory', compact('directorio', 'tipe_directory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'txtapellidos' => 'required',
            'txtnombres' => 'required',
            'txtcotribuyente' => 'required',
            'txttipodir' => 'required'
        ]);
        

        $nuevoRegistro = Directory::findOrFail($id);

        $nuevoRegistro->nombres = $request->txtnombres;
        $nuevoRegistro->apellidos = $request->txtapellidos;
        $nuevoRegistro->contribuyente = $request->txtcotribuyente;
        $nuevoRegistro->email = $request->txtemail;
        $nuevoRegistro->direccion = $request->txtdireccion;
        $nuevoRegistro->nit = $request->txtnit;
        $nuevoRegistro->dpi = $request->txtdpi;         
        $nuevoRegistro->telefono = $request->txttelefono;         
        $nuevoRegistro->directorytipes_id = $request->txttipodir;         
        //$nuevoRegistro->estado = "Activo";         
        $nuevoRegistro->save();
        return redirect()->route('list_directory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $nuevoRegistro = Directory::findOrFail($id);
    
        $nuevoRegistro->estado = "Inactivo";         
        $nuevoRegistro->save();
        return redirect()->route('list_directory');
    }
}
