<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
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

    return redirect('/dashboard');
});



Route::middleware(['auth'])->group(function () {
    //General Route
    Route::get('/dashboard', [RouteController::class,'dashboard'])->name('Dashboard');
    // Customer routes
    Route::get('order',[RouteController::class,'placeOrder'])->name('PlaceOrder');
    Route::get('order/store',[OrderController::class,'store'])->name('StoreOrder');
    Route::post('order/confirm',[RouteController::class,'confirmOrder'])->name('ConfirmOrder');
    Route::get('order/confirm/{code}',[OrderController::class,'store']);
    Route::get('order/done',[RouteController::class,'orderDone']);
    Route::get('orders',[RouteController::class,'allMyOrders'])->name('Orders');
    Route::post('order/update',[OrderController::class,'update']);
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
