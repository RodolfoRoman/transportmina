<?php

namespace App\Http\Controllers;

use App\Models\directorytipe;
use App\Http\Requests\StoredirectorytipeRequest;
use App\Http\Requests\UpdatedirectorytipeRequest;
use Illuminate\Support\Facades\DB;

class DirectorytipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorytipe = DB::table('directorytipes')
                    ->select('id','tipodirectorio')
                    ->get();
        return view('directorytipe.ListDirectoryTipe', compact('directorytipe'));
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
     * @param  \App\Http\Requests\StoredirectorytipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredirectorytipeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\directorytipe  $directorytipe
     * @return \Illuminate\Http\Response
     */
    public function show(directorytipe $directorytipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\directorytipe  $directorytipe
     * @return \Illuminate\Http\Response
     */
    public function edit(directorytipe $directorytipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedirectorytipeRequest  $request
     * @param  \App\Models\directorytipe  $directorytipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedirectorytipeRequest $request, directorytipe $directorytipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\directorytipe  $directorytipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(directorytipe $directorytipe)
    {
        //
    }
}
