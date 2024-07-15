<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

    //Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/create/', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/supplier/update/', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/supplier/show/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

    //Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/create/', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

    //Unit
    Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/create/', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/show/{id}', [UnitController::class, 'show'])->name('unit.show');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');


    //Product Category
    Route::get('/product/category', [ProductCategoryController::class, 'index'])->name('product.category.index');
    Route::get('/product/category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
    Route::post('/product/category/create/', [ProductCategoryController::class, 'store'])->name('product.category.store');
    Route::get('/product/category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
    Route::post('/product/category/update/', [ProductCategoryController::class, 'update'])->name('product.category.update');
    Route::get('/product/category/show/{id}', [ProductCategoryController::class, 'show'])->name('product.category.show');
    Route::get('/product/category/delete/{id}', [ProductCategoryController::class, 'delete'])->name('product.category.delete');

    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');



});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/homepage.php';