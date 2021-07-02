<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DisplayController::class, 'index'])->name('index');
Route::get('importExportView', [ImportController::class, 'importExportView'])->name('importExportView');
Route::post('import', [ImportController::class, 'import'])->name('import');
