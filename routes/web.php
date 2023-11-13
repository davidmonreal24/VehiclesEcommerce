<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Rutas para el Administrador
Route::middleware(['auth'])->group(function () {
    // Rutas para descargar PDF, exportar a Excel, etc.
    Route::get('/admin/vehicles', [AdminController::class, 'index'])->name('admin.vehicles.index');
    Route::get('/admin/vehicles/create', [AdminController::class, 'create'])->name('admin.vehicles.create');
    Route::post('/admin/vehicles/store', [AdminController::class, 'store'])->name('admin.vehicles.store');
    Route::get('/admin/vehicles/edit/{id}', [AdminController::class, 'edit'])->name('admin.vehicles.edit');
    Route::put('/admin/vehicles/update/{vehicle}', [AdminController::class, 'update'])->name('admin.vehicles.update');
    Route::delete('/admin/vehicles/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.vehicles.destroy');
    Route::get('/admin/vehicles/pdf-most-sold', [AdminController::class, 'downloadMostSoldPDF'])->name('admin.vehicles.pdf-most-sold');
    Route::get('/admin/vehicles/pdf-all-sold', [AdminController::class, 'downloadAllSoldPDF'])->name('admin.vehicles.pdf-all-sold');
    Route::get('/admin/export/excel', [AdminController::class, 'exportToExcel'])->name('admin.export.excel');
});

// Rutas para el Cliente

Route::middleware(['auth'])->group(function () {
    Route::get('/client/requests', [ClientController::class, 'index'])->name('client.requests.index');
    Route::get('/client/requests/create', [ClientController::class, 'create'])->name('client.requests.create');
    Route::post('/client/requests/store', [ClientController::class, 'store'])->name('client.requests.store');
    Route::get('/client/requests/edit/{id}', [ClientController::class, 'edit'])->name('client.requests.edit');
    Route::put('/client/requests/update/{clientRequest}', [ClientController::class, 'update'])->name('client.requests.update');
    Route::delete('/client/requests/destroy/{id}', [ClientController::class, 'destroy'])->name('client.requests.destroy');
});