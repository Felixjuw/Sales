<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('sales/export', [SalesController::class, 'export'])->name('sales.export');
Route::get('sales/pdf', [SalesController::class, 'exportPdf'])->name('sales.pdf');

Route::get('sales/uploadView', [SalesController::class, 'uploadView'])->name('sales.uploadView');
Route::post('sales/upload', [SalesController::class, 'upload'])->name('sales.upload');
Route::get('/', [SalesController::class, 'index'])->name('home');
Route::resource('sales', SalesController::class);
