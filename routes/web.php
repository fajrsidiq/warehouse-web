<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewItemController;
use App\Http\Controllers\StockController;

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
