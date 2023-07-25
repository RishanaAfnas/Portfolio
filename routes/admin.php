<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\companyController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/login',[loginController::class,'login']);
Route::post('admin/dologin',[loginController::class,'doLogin'])->name('do.login');
Route::get('admin/dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::get('admin/company',[companyController::class,'list'])->name('company.list');
