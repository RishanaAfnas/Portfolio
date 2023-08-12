<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\companyController;
use App\Http\Controllers\Admin\serviceController;
use App\Http\Controllers\Admin\clientsController;
use App\Http\Controllers\admin\expertController;
use App\Http\Controllers\Admin\testimonialsController;

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

Route::get('admin-company',[companyController::class,'list'])->name('company.list');
Route::post('admin-store',[companyController::class,'store'])->name('about.store');
Route::get('admin-edit/{id}',[companyController::class,'edit'])->name('about.edit');
Route::put('admin-update/{id}', [companyController::class, 'update'])->name('about.update');
Route::delete('admin-delete/{id}', [companyController::class, 'delete'])->name('about.delete');

Route::get('services-company',[serviceController::class,'list'])->name('services.list');
Route::post('services-store',[serviceController::class,'store'])->name('services.store');
Route::get('services-edit/{id}',[serviceController::class,'edit'])->name('services.edit');
Route::put('services-update/{id}', [serviceController::class, 'update'])->name('services.update');

Route::delete('services-delete/{id}', [serviceController::class, 'delete'])->name('services.delete');

Route::get('clients-company',[clientsController::class,'list'])->name('clients.list');
Route::post('clients-store',[clientsController::class,'store'])->name('clients.store');
Route::get('clients-edit/{id}',[clientsController::class,'edit'])->name('clients.edit');
Route::put('clients-update/{id}', [clientsController::class,'update'])->name('clients.update');

Route::delete('clients-delete/{id}', [clientsController::class, 'delete'])->name('clients.delete');


Route::get('testimonials-company',[testimonialsController::class,'list'])->name('testimonials.list');
Route::post('testimonials-store',[testimonialsController::class,'store'])->name('testimonials.store');
Route::get('testimonials-edit/{id}',[testimonialsController::class,'edit'])->name('testimonials.edit');
Route::put('testimonials-update/{id}', [testimonialsController::class, 'update'])->name('testimonials.update');

Route::delete('testimonials-delete/{id}', [testimonialsController::class, 'delete'])->name('testimonials.delete');

Route::get('experts-company',[expertController::class,'list'])->name('experts.list');
Route::post('experts-store',[expertController::class,'store'])->name('experts.store');
Route::get('experts-edit/{id}',[expertController::class,'edit'])->name('experts.edit');
Route::put('experts-update/{id}', [expertController::class,'update'])->name('experts.update');
Route::delete('experts-delete/{id}', [expertController::class, 'delete'])->name('experts.delete');



