<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class PayrollExport implements FromCollection
{
    public function __construct(int $id)
    {
        $this->planilla = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Payroll::all();
        return DB::table('payroll_details')
            ->select(
                'payroll_details.id',
                'years.anio',
                'months.mes',
                'directories.nombres',
                'directories.apellidos',
                'employees.cuenta_deposito',
                'payroll_details.salario',
                'payroll_details.descuento',
                'payroll_details.extras',
            )
            ->join('payrolls', 'payrolls.id', '=', 'payroll_details.payroll_id')
            ->join('months', 'months.id', '=', 'payrolls.month_id')
            ->join('years', 'years.id', '=', 'months.year_id')
            ->join('employees', 'employees.id', '=', 'payroll_details.employee_id')
            ->join('directories', 'directories.id', '=', 'employees.directory_id')
            ->join('headquarters', 'headquarters.id', '=', 'payroll_details.headquarter_id')
            ->join('costcenters', 'costcenters.id', '=', 'payroll_details.costcenter_id')
            ->orderBy('payroll_details.id', 'ASC')
            ->where('payroll_details.payroll_id','=',$this->planilla)
            ->get();
    }
}
