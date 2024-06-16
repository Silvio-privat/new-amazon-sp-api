<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\InvoiceController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name
    ('profile.destroy');


    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('admin/dashboard', [HomeController::class, 'index']);

        Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
       Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
        Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin/products/save');
        Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
       Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
       Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/products/delete');



       ///// Invoice

       Route::get('/admin/invoices', [InvoiceController::class, 'index'])->name('admin/invoices');
       Route::get('/admin/invoices/create', [InvoiceController::class, 'create'])->name('admin/invoices/create');
        Route::post('/admin/invoices/save', [InvoiceController::class, 'save'])->name('admin/invoices/save');
        Route::get('/admin/invoices/edit/{id}', [InvoiceController::class, 'edit'])->name('admin/invoices/edit');
       Route::put('/admin/invoices/edit/{id}', [InvoiceController::class, 'update'])->name('admin/invoices/update');
       Route::get('/admin/invoices/delete/{id}', [InvoiceController::class, 'delete'])->name('admin/invoices/delete');





    });


});

require __DIR__.'/auth.php';




