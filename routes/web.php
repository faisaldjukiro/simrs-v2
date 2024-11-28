<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\billing\BillingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('billing/rawat-jalan', [BillingController::class, 'index'])->name('billing-jalan');
Route::get('billing/export', [BillingController::class, 'exportExcel'])->name('export.csv');
Route::get('billing/rawat-inap', [BillingController::class, 'inap'])->name('billing-inap');
Route::get('billing/export/inap', [BillingController::class, 'exportExcelInap'])->name('billing_export_inap');