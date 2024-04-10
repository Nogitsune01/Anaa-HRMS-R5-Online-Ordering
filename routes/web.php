<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OnlineOrderingController;
use App\Http\Controllers\OnlineOrdersController;
use App\Http\Controllers\ProfileController;
use App\Models\R2Menu;
use App\Models\Restau2Connection;
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
    return view('auth.login');
});






//ONLINE ORDERING PAGE ROUTE
Route::middleware(['auth', 'loggedin'])->group(function(){
    Route::prefix('orders')->middleware(['auth', 'verified'])->group(function(){
       
        Route::get('restaurant-ordering', [OnlineOrderingController::class, 'orderIndex']);
        Route::post('add-to-orders/{user_id}', [OnlineOrderingController::class, 'addToOrders']);
        Route::get('delete-item-cart/{id}', [OnlineOrderingController::class, 'deleteItem']);
        Route::get('http://192.168.101.74:8000/payment-gateway', [OnlineOrderingController::class, 'checkoutCart']);

        //CHECKOUT COMPLETE
        Route::get('restaurant-ordering/my-orders', [OnlineOrderingController::class, 'myOrders']);
        Route::get('review-orders/{id}', [OnlineOrderingController::class, 'reviewOrders']);

        //UPDATE QUANTITY
        Route::post('update-quantity/{id}', [OnlineOrderingController::class, 'updateQuantity']);

    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::middleware(['auth', 'verified'])->group(function(){
    //PLACE YOUR ROUTES HERE FOR VERIFIED USER

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //APPS
    Route::get('apps-todolist', [HomeController::class, 'todolist']);
    });

    //ORDERS
    Route::get('online-active-orders', [OnlineOrdersController::class, 'index']);


    //MENUS
    Route::get('menus', [MenuController::class, 'index']);
    
});


require __DIR__.'/auth.php';
