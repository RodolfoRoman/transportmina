<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function index()
    {

        /*
        $ordenes = DB::table('orders')->where('orders.estado', 'Activo')->count();

        $count = DB::table('orders')
            ->select(DB::raw('count(*) as count'))
            ->where('estado', '=', 'Activo')
            ->first()
            ->count;

        */
        return view('admin.index');
    }
}
