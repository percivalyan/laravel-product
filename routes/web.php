<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard-admin');
    // Display a listing of products
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

    // Show the form for creating a new product
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

    // Store a newly created product in storage
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

    // Show the form for editing the specified product
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

    // Update the specified product in storage
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

    // Remove the specified product from storage
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Display a listing of transactions
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

    // Show the form for creating a new transaction
    Route::get('/admin/transactions/create', [TransactionController::class, 'create'])->name('admin.transactions.create');

    // Store a newly created transaction in storage
    Route::post('/admin/transactions', [TransactionController::class, 'store'])->name('admin.transactions.store');

    // Show the form for editing the specified transaction
    Route::get('/admin/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('admin.transactions.edit');

    // Update the specified transaction in storage
    Route::put('/admin/transactions/{transaction}', [TransactionController::class, 'update'])->name('admin.transactions.update');

    // Remove the specified transaction from storage
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('admin.transactions.destroy');

    Route::patch('admin/transactions/{transaction}/approve', [TransactionController::class, 'approve'])->name('admin.transactions.approve');
Route::patch('admin/transactions/{transaction}/reject', [TransactionController::class, 'reject'])->name('admin.transactions.reject');

});

Route::get('products', [ProductController::class, 'indexUser'])->name('transactions.products');
Route::get('transactions', [TransactionController::class, 'indexUser'])->name('transactions.index');
// Show the form for creating a new transaction
Route::get('transactions/create', [TransactionController::class, 'createUser'])->name('transactions.create');

// Store a newly created transaction in storage
Route::post('transactions', [TransactionController::class, 'storeUser'])->name('transactions.store');

require __DIR__ . '/auth.php';

// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);