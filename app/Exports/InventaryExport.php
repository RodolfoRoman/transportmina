<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;

class InventaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Payroll::all();

        return DB::table('inventory_transactions')
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
            'inventory_transactions.tipo_transaccion',
        )
        ->join('headquarters', 'headquarters.id', '=', 'inventory_transactions.headquarter_id')
        ->join('sub_costcenters', 'sub_costcenters.id', '=', 'inventory_transactions.costcenter_id')
        ->join('costcenters', 'costcenters.id', '=', 'sub_costcenters.costcenter_id')
        ->join('activities', 'activities.id', '=', 'inventory_transactions.activity_id')
        ->join('products', 'products.id', '=', 'inventory_transactions.product_id')
        ->join('measures', 'measures.id', '=', 'products.measure_id')
        ->join('directories', 'directories.id', '=', 'inventory_transactions.directory_id')
        ->where('inventory_transactions.estado', '=','Activo')
        ->orderBy('inventory_transactions.id', 'ASC')
        ->get();
    }
}
