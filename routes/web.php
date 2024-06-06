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

//english
Route::get('/homepage', function () {
    $data = [
        'content' => 'home/eng/home/index'
    ];
    //return view('home.index');
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/aboutus', function () {
    $data = [
        'content' => 'home/eng/about/index'
    ];
    //return view('home.index');
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/services', function () {
    $data = [
        'content' => 'home/eng/coldstorage/index'
    ];
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/fish', function () {
    $data = [
        'content' => 'home/eng/ikan/index'
    ];
    //return view('home.index');
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/delivery', function () {
    $data = [
        'content' => 'home/eng/kirim/index'
    ];
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/contactus', function () {
    $data = [
        'content' => 'home/eng/contact/index'
    ];
    //return view('home.index');
    return view('home.eng.layouts.wrapper', $data);
});

Route::get('/faqs', function () {
    $data = [
        'content' => 'home/eng/faq/index'
    ];
    //return view('home.index');
    return view('home.eng.layouts.wrapper', $data);
});


//chinese
Route::get('/主页', function () {
    $data = [
        'content' => 'home/中文/home/index'
    ];
    //return view('home.index');
    return view('home.中文.layouts.wrapper', $data);
});

Route::get('/关于我们', function () {
    $data = [
        'content' => 'home/中文/about/index'
    ];
    //return view('home.index');
    return view('home.中文.layouts.wrapper', $data);
});

Route::get('/服务', function () {
    $data = [
        'content' => 'home/中文/coldstorage/index'
    ];
    return view('home.中文.layouts.wrapper', $data);
});

Route::get('/鱼类', function () {
    $data = [
        'content' => 'home/中文/ikan/index'
    ];
    //return view('home.index');
    return view('home.中文.layouts.wrapper', $data);
});

Route::get('/送货', function () {
    $data = [
        'content' => 'home/中文/kirim/index'
    ];
    return view('home.中文.layouts.wrapper', $data);
});


Route::get('/联系我们', function () {
    $data = [
        'content' => 'home/中文/contact/index'
    ];
    //return view('home.index');
    return view('home.中文.layouts.wrapper', $data);
});

Route::get('/常见问题解答', function () {
    $data = [
        'content' => 'home/中文/faq/index'
    ];
    //return view('home.index');
    return view('home.中文.layouts.wrapper', $data);
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});     

// Routes accessible to authenticated users with the 'admin' role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/baru', [NewItemController::class, 'create'])->name('newitem.create');
    Route::post('/baru', [NewItemController::class, 'store'])->name('newitem.store');
    Route::get('/stokmasuk', [StockInController::class, 'create'])->name('stock.in');
    Route::post('/stokmasuk', [StockInController::class, 'store'])->name('stockin.store');
    Route::get('/stokkeluar', [StockOutController::class, 'create'])->name('stock.out');
    Route::post('/stokkeluar', [StockOutController::class, 'store'])->name('stockout.store');
    Route::get('/stokmasuk/search', [StockController::class, 'searchIncoming'])->name('stockin.search');
    Route::get('/stokkeluar/search', [StockController::class, 'searchOutgoing'])->name('stockout.search');
    Route::post('/pdf/in_invoice', [PDFController::class, 'generateInInvoice'])->name('pdf.in_invoice');
    Route::post('/pdf/out_invoice', [PDFController::class, 'generateOutInvoice'])->name('pdf.out_invoice');
});

// Routes accessible to all authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/datastok', [StockController::class, 'currentStock'])->name('stock.current');
    Route::get('/datamasuk', [StockController::class, 'incomingLog'])->name('logs.incoming');
    Route::get('/datakeluar', [StockController::class, 'outgoingLog'])->name('logs.outgoing');
    Route::get('/pdf/current_stock', [PDFController::class, 'generateCurrentStock'])->name('pdf.current_stock');
    Route::get('/pdf/incoming-log', [PDFController::class, 'generateIncomingLogPDF'])->name('pdf.generateIncomingLogPDF');
    Route::get('/pdf/outgoing-log', [PDFController::class, 'generateOutgoingLogPDF'])->name('pdf.generateOutgoingLogPDF');
    Route::get('/valuasi', [StockController::class, 'valuation'])->name('stock.valuation');
    Route::get('/stok/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');
    Route::patch('/stok/{stock}', [StockController::class, 'update'])->name('stocks.update');
    Route::delete('/logs/incoming/{log}', [StockController::class, 'deleteIncomingLog'])->name('logs.incoming.delete');
    Route::delete('/logs/outgoing/{log}', [StockController::class, 'deleteOutgoingLog'])->name('logs.outgoing.delete');
    Route::get('/delete-history', [StockController::class, 'deleteHistory'])->name('delete_history.index');
});





