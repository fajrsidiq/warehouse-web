<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;


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

Route::get('/', function () {
    $data = [
        'content' => 'home/home/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});

Route::get('/about', function () {
    $data = [
        'content' => 'home/about/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});

Route::get('/ikan', function () {
    $data = [
        'content' => 'home/ikan/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});

Route::get('/contact', function () {
    $data = [
        'content' => 'home/contact/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});

Route::get('/faq', function () {
    $data = [
        'content' => 'home/faq/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/newitem', [NewItemController::class, 'create'])->name('newitem.create');
Route::post('/newitem', [NewItemController::class, 'store'])->name('newitem.store');
Route::get('/stock', [StockController::class, 'currentStock'])->name('stock.current');
Route::get('/stockh1', [StockController::class, 'incomingLog'])->name('logs.incoming');
Route::get('/stockh2', [StockController::class, 'outgoingLog'])->name('logs.outgoing');
Route::get('/stockin', [StockInController::class, 'create'])->name('stock.in');
Route::post('/stockin', [StockInController::class, 'store'])->name('stockin.store');
Route::get('/stockout', [StockOutController::class, 'create'])->name('stock.out');
Route::post('/stockout', [StockOutController::class, 'store'])->name('stockout.store');

