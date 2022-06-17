<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CostcenterController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\DirectorytipeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HeadquarterController;
use App\Http\Controllers\InventoryTransactionController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductfamilyController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubCostcenterController;
use App\Http\Controllers\YearController;
use App\Models\Payroll;

use App\Exports\InventaryExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('',[HomeController::class, 'index'])->name('inicio');


//tipos de directorios
Route::get('directorytipe/list',[DirectorytipeController::class, 'index'])->name('list_directorytipe');
//Directorios
Route::get('directory/create',[DirectoryController::class, 'create'])->name('create_directory');
Route::get('directory/list',[DirectoryController::class, 'index'])->name('list_directory');
Route::post('directory/save',[DirectoryController::class, 'store'])->name('save_directory');
Route::get('directory_edit/{id}',[DirectoryController::class, 'edit'])->name('edit_directory');
Route::put('directory_update/{id}',[DirectoryController::class, 'update'])->name('update_directory');
Route::put('directory_destroy/{id}',[DirectoryController::class, 'destroy'])->name('destroy_directory');

//Familias de productos
Route::get('productfamily/list',[ProductfamilyController::class, 'index'])->name('list_productfamily');
Route::get('productfamily/create',[ProductfamilyController::class, 'create'])->name('create_productfamily');
Route::post('productfamily/save',[ProductfamilyController::class, 'store'])->name('save_productfamily');
Route::get('productfamily/{id}',[ProductfamilyController::class, 'edit'])->name('edit_productfamily');
Route::put('productfamily_update/{id}',[ProductfamilyController::class, 'update'])->name('update_productfamily');
Route::put('productfamily_destroy/{id}',[ProductfamilyController::class, 'destroy'])->name('destroy_productfamily');

//unidades de medida
Route::get('measure/list',[MeasureController::class, 'index'])->name('list_measure');

//Headquarter
Route::get('headquarters/list',[HeadquarterController::class, 'index'])->name('list_headquarter');

//Products
Route::get('product/create',[ProductController::class, 'create'])->name('create_product');
Route::post('product/save',[ProductController::class, 'store'])->name('save_product');
Route::get('product/list',[ProductController::class, 'index'])->name('list_product');
Route::get('product/{id}',[ProductController::class, 'edit'])->name('edit_product');
Route::put('product_update/{id}',[ProductController::class, 'update'])->name('update_product');
Route::put('product_destroy/{id}',[ProductController::class, 'destroy'])->name('destroy_product');

//Cost center
Route::get('cecos/list',[CostcenterController::class, 'index'])->name('list_costcenter');

Route::get('subcostcenter/create',[SubCostcenterController::class, 'create'])->name('create_subcostcenter');
Route::post('subcostcenter/save',[SubCostcenterController::class, 'store'])->name('save_subcostcenter');
Route::get('subcostcenter/list',[SubCostcenterController::class, 'index'])->name('list_subcostcenter');
Route::get('subcostcenter/{id}',[SubCostcenterController::class, 'edit'])->name('edit_subcostcenter');
Route::put('subcostcenter_update/{id}',[SubCostcenterController::class, 'update'])->name('update_subcostcenter');
Route::put('subcostcenter_destroy/{id}',[SubCostcenterController::class, 'destroy'])->name('destroy_subcostcenter');

//subcentros de costo

//Actividades
Route::get('activity/list',[ActivityController::class, 'index'])->name('list_activity');

//years
Route::get('year/create',[YearController::class, 'create'])->name('create_year');
Route::post('year/save',[YearController::class, 'store'])->name('save_year');
Route::get('year/list',[YearController::class, 'index'])->name('list_year');
Route::put('year_destroy/{id}',[YearController::class, 'destroy'])->name('destroy_year');

//mounths
Route::get('month/list',[MonthController::class, 'index'])->name('list_month');
Route::get('month_budget/{id}',[MonthController::class, 'presupuestomes'])->name('presupuesto_mensual');

//budget
Route::get('budget/create',[BudgetController::class, 'create'])->name('create_budget');
Route::post('budget/save',[BudgetController::class, 'store'])->name('save_budget');
Route::put('budget_destroy/{id}',[BudgetController::class, 'destroy'])->name('destroy_budget');

//produccion
Route::get('production/list',[ProductionController::class, 'index'])->name('list_production');
Route::get('production/create',[ProductionController::class, 'create'])->name('create_production');
Route::post('production/save',[ProductionController::class, 'store'])->name('save_production');
Route::get('production/{id}',[ProductionController::class, 'edit'])->name('edit_production');
Route::put('production_update/{id}',[ProductionController::class, 'update'])->name('update_production');
Route::put('production_destroy/{id}',[ProductionController::class, 'destroy'])->name('destroy_production');

//orders
Route::get('order/list',[OrderController::class, 'index'])->name('list_order');
Route::get('order/create',[OrderController::class, 'create'])->name('create_order');
Route::post('order/save',[OrderController::class, 'store'])->name('save_order');
Route::get('order/{id}',[OrderController::class, 'edit'])->name('edit_order');
Route::put('order/{id}',[OrderController::class, 'update'])->name('update_order');
Route::put('order_destroy/{id}',[OrderController::class, 'destroy'])->name('destroy_order');

//Sales
Route::get('sale/list',[SaleController::class, 'index'])->name('list_sale');
Route::get('sale/create',[SaleController::class, 'create'])->name('create_sale');
Route::post('sale/save',[SaleController::class, 'store'])->name('save_sale');
Route::get('sale/{id}',[SaleController::class, 'edit'])->name('edit_sale');
Route::put('sale/{id}',[SaleController::class, 'update'])->name('update_sale');
Route::put('sale_destroy/{id}',[SaleController::class, 'destroy'])->name('destroy_sale');
Route::put('sale_destroy/{id}',[SaleController::class, 'destroy'])->name('destroy_sale');
Route::get('invoice/{id}',[SaleController::class, 'invoice'])->name('invoice');

//employees
Route::get('employee/list',[EmployeeController::class, 'index'])->name('list_employee');
Route::get('employee/create',[EmployeeController::class, 'create'])->name('create_employee');
Route::post('employee/save',[EmployeeController::class, 'store'])->name('save_employee');
Route::get('employee/{id}',[EmployeeController::class, 'edit'])->name('edit_employee');
Route::put('employee/{id}',[EmployeeController::class, 'update'])->name('update_employee');
Route::put('employee_destroy/{id}',[EmployeeController::class, 'destroy'])->name('destroy_employee');


//Payroll
Route::get('payroll/list',[PayrollController::class, 'index'])->name('list_payroll');
Route::get('payroll/create',[PayrollController::class, 'create'])->name('create_payroll');
Route::post('payroll/save',[PayrollController::class, 'store'])->name('save_payroll');
Route::put('payroll_destroy/{id}',[PayrollController::class, 'destroy'])->name('destroy_payroll');
Route::get('payroll_download/{id}',[PayrollController::class, 'download'])->name('download_payroll');

//Payroll
Route::get('inventary/int/list',[InventoryTransactionController::class, 'indexInt'])->name('list_int');
Route::get('inventary/int/create',[InventoryTransactionController::class, 'createInt'])->name('create_int');
Route::post('inventary/int/save',[InventoryTransactionController::class, 'storeInt'])->name('save_int');
Route::get('inventary/int/{id}',[InventoryTransactionController::class, 'editInt'])->name('edit_int');
Route::put('inventary/int/{id}',[InventoryTransactionController::class, 'updateInt'])->name('update_int');
Route::put('inventary/int_destroy/{id}',[InventoryTransactionController::class, 'destroyInt'])->name('destroy_int');
//Payroll
Route::get('inventary/out/list',[InventoryTransactionController::class, 'indexOut'])->name('list_Out');
Route::get('inventary/out/create',[InventoryTransactionController::class, 'createOut'])->name('create_out');
Route::post('inventary/out/save',[InventoryTransactionController::class, 'storeOut'])->name('save_out');
Route::get('inventary/out/{id}',[InventoryTransactionController::class, 'editOut'])->name('edit_out');
Route::put('inventary/out/{id}',[InventoryTransactionController::class, 'updateOut'])->name('update_out');
Route::put('inventary/out_destroy/{id}',[InventoryTransactionController::class, 'destroyInt'])->name('destroy_out');

Route::get('/excel', function () {
    return Excel::download(new InventaryExport, 'Inventario.xlsx');
})->name('exportar_inventario');
