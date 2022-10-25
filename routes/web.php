<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ServantsController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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






// Auth::routes(["register" => false, "reset" => false]);
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCatego'])->name('store.category');

Route::get('create/category', [CategoryController::class, 'create']);

Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('category/update/{id}', [CategoryController::class, 'Update']);

Route::delete('delete/category/{id}', [CategoryController::class, 'Delete']);

Route::get('/search', [CategoryController::class, 'search'])->name('search');




Route::get('/All/table', [TableController::class, 'index'])->name('all.table');

Route::post('/table/add', [TableController::class, 'AddTable'])->name('store.table');

Route::get('table/edit/{id}', [TableController::class, 'Edit']);

Route::get('create/table', [TableController::class, 'create']);

Route::post('table/update/{id}', [TableController::class, 'Update']);

Route::delete('delete/table/{id}', [TableController::class, 'Delete']);

Route::get('/changeStatus', [TableController::class, 'ChangeStatus'])->name('changeStatus');


Route::get('/All/servants', [ServantsController::class, 'index'])->name('all.servants');

Route::post('/servent/add', [ServantsController::class, 'AddServant'])->name('store.servant');

Route::get('create/servant', [ServantsController::class, 'create']);

Route::get('servant/edit/{id}', [ServantsController::class, 'Edit']);

Route::post('servant/update/{id}', [ServantsController::class, 'Update']);

Route::delete('delete/servant/{id}', [ServantsController::class, 'Delete']);






Route::get('/All/menu', [MenuController::class, 'index'])->name('all.menus');

Route::post('/menu/add', [MenuController::class, 'AddMenu'])->name('store.menu');

Route::get('create/menu', [MenuController::class, 'create']);


Route::get('menu/edit/{id}', [MenuController::class, 'edit']);

Route::post('menu/update/{id}', [MenuController::class, 'Update']);

Route::delete('delete/menu/{id}', [MenuController::class, 'Delete']);



Route::get('/payments', [PaymentController::class, 'index']);

Route::get('/vents', [PaymentController::class, 'vent'])->name('store.vents');




Route::post('/sales/add', [SalesController::class, 'store'])->name("sales.store");

Route::get('sales/edit/{id}', [SalesController::class, 'edit']);

Route::post('sales/update/{id}', [SalesController::class, 'Update']);

Route::get('payment/index', [SalesController::class, 'index']);

Route::delete('delete/sale/{id}', [SalesController::class, 'destroy']);




Route::get('/reports', [ReportController::class, 'indexReports']);

Route::post('reports/generate', [ReportController::class, 'generate'])->name("reports.generate");

Route::post('reports.export', [ReportController::class, 'export'])->name("reports.export");


Route::get('/front', [FrontController::class, 'index']);

Route::get('/reservation', [FrontController::class, 'reservation']);

Route::post('/addReservation', [FrontController::class, 'AddReservation'])->name('store.reservation');

Route::get('/reservationClient', [FrontController::class, 'reservationClient']);

Route::get('softDelete/reservation/{id}', [FrontController::class, 'softDelete']);

Route::get('category/restore/{id}', [FrontController::class, 'restoreReservation']);

Route::get('category/delete/{id}', [FrontController::class, 'daleteReservation']);

Route::get('allReservastion', [FrontController::class, 'AllReservation']);

Route::post('addToCard/{id}', [FrontController::class, 'AddToCard']);

Route::get('/home', [HomeController::class, 'role']);

Route::get('/shwoCart/{id}', [FrontController::class, 'shwoCart']);

Route::get('removeCart/{id}', [FrontController::class, 'daleteCart']);

Route::get('removeAllCart/{id}', [FrontController::class, 'deleteAllCart']);

// Route::get('home', 'App\Http\Controllers\HomeController@role'); 
