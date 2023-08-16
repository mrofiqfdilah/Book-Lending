<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamanController;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


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
    return view('welcome');
});



Route::get('/export-pdf', function () {
    $pinjaman = \App\Models\pinjaman::all();
    $pdf = new Dompdf();
    $pdf->loadHtml(view('table_pemesan_buku_pdf', compact('pinjaman')));
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();

    // Generate the PDF file name with the current date
    $filename = 'table_pemesan_buku_' . date('Y-m-d') . '.pdf';

    return $pdf->stream($filename);
})->name('export-pdf');

Route::resource('pinjaman', PinjamanController::class);
Route::resource('buku', BukuController::class);

Route::get('/listbuku/{namabuku?}', [BukuController::class, 'listbuku'])->name('listbuku');
Route::get('/cart', [PinjamanController::class, 'cart'])->name('cart');

Route::get('/detail/{namabuku?}', [PinjamanController::class, 'detail'])->name('detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php

Route::post('kembalikan/{id}', [PinjamanController::class, 'kembalikan'])->name('kembalikan');

