<?php

use App\Http\Controllers\ProfileController;
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

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\PostOrderController;

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/workers', [WorkerController::class, 'index'])->name('workers.index');
Route::get('/workers/create', [WorkerController::class, 'create'])->name('workers.create');
Route::post('/workers', [WorkerController::class, 'store'])->name('workers.store');
Route::get('/workers/{id}', [WorkerController::class, 'show'])->name('workers.show');
Route::get('/workers/{id}/edit', [WorkerController::class, 'edit'])->name('workers.edit');
Route::put('/workers/{id}', [WorkerController::class, 'update'])->name('workers.update');
Route::delete('/workers/{id}', [WorkerController::class, 'destroy'])->name('workers.destroy');
// Tambahkan rute untuk fungsi-fungsi lainnya dalam WorkerController

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
// Tambahkan rute untuk fungsi-fungsi lainnya dalam OrderController

Route::get('/executions', [ExecutionController::class, 'index'])->name('executions.index');
Route::get('/executions/create', [ExecutionController::class, 'create'])->name('executions.create');
Route::post('/executions', [ExecutionController::class, 'store'])->name('executions.store');
Route::get('/executions/{id}', [ExecutionController::class, 'show'])->name('executions.show');
Route::get('/executions/{id}/edit', [ExecutionController::class, 'edit'])->name('executions.edit');
Route::put('/executions/{id}', [ExecutionController::class, 'update'])->name('executions.update');
Route::delete('/executions/{id}', [ExecutionController::class, 'destroy'])->name('executions.destroy');
// Tambahkan rute untuk fungsi-fungsi lainnya dalam ExecutionController

Route::get('/post_orders', [PostOrderController::class, 'index'])->name('post_orders.index');
Route::get('/post_orders/create', [PostOrderController::class, 'create'])->name('post_orders.create');
Route::post('/post_orders', [PostOrderController::class, 'store'])->name('post_orders.store');
Route::get('/post_orders/{id}', [PostOrderController::class, 'show'])->name('post_orders.show');
Route::get('/post_orders/{id}/edit', [PostOrderController::class, 'edit'])->name('post_orders.edit');
Route::put('/post_orders/{id}', [PostOrderController::class, 'update'])->name('post_orders.update');
Route::delete('/post_orders/{id}', [PostOrderController::class, 'destroy'])->name('post_orders.destroy');
// Tambahkan rute untuk fungsi-fungsi lainnya dalam PostOrderController


require __DIR__.'/auth.php';
