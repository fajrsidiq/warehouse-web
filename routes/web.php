<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\PDFController;


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

Route::get('/coldstorage', function () {
    $data = [
        'content' => 'home/coldstorage/index'
    ];
    return view('home.layouts.wrapper', $data);
});


Route::get('/ikan', function () {
    $data = [
        'content' => 'home/ikan/index'
    ];
    //return view('home.index');
    return view('home.layouts.wrapper', $data);
});

Route::get('/kirim', function () {
    $data = [
        'content' => 'home/kirim/index'
    ];
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
Route::get('/baru', [NewItemController::class, 'create'])->name('newitem.create');
Route::post('/baru', [NewItemController::class, 'store'])->name('newitem.store');
Route::get('/datastok', [StockController::class, 'currentStock'])->name('stock.current');
Route::get('/datamasuk', [StockController::class, 'incomingLog'])->name('logs.incoming');
Route::get('/datakeluar', [StockController::class, 'outgoingLog'])->name('logs.outgoing');
Route::get('/stokmasuk', [StockInController::class, 'create'])->name('stock.in');
Route::post('/stokmasuk', [StockInController::class, 'store'])->name('stockin.store');
Route::get('/stokkeluar', [StockOutController::class, 'create'])->name('stock.out');
Route::post('/stokkeluar', [StockOutController::class, 'store'])->name('stockout.store');
Route::get('/stokmasuk/search', [StockController::class, 'searchIncoming'])->name('stockin.search');
Route::get('/stokkeluar/search', [StockController::class, 'searchOutgoing'])->name('stockout.search');
Route::get('/pdf/incoming-log', [PDFController::class, 'generateIncomingLogPDF'])->name('pdf.generateIncomingLogPDF');
Route::get('/pdf/outgoing-log', [PDFController::class, 'generateOutgoingLogPDF'])->name('pdf.generateOutgoingLogPDF');
Route::post('/pdf/in_invoice', [PDFController::class, 'generateInInvoice'])->name('pdf.in_invoice');
Route::post('/pdf/out_invoice', [PDFController::class, 'generateOutInvoice'])->name('pdf.out_invoice');


