<?php

use App\Http\Controllers\BE\ArtikelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BE\DashboardController;
use App\Http\Controllers\BE\PenulisController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'indexMain'])->name('indexMain');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('artikel', ArtikelController::class);
    Route::resource('penulis', ArtikelController::class);
    Route::resource('komentar', PenulisController::class);
});
// Route::resource('penulis', PenulisController::class);
Route::post('/register-penulis', [PenulisController::class, 'register'])->name('register-penulis');
Route::get('/detail-artikel/{id}', [ArtikelController::class, 'detailArtikel'])->name('detail-artikel');

require __DIR__.'/auth.php';
