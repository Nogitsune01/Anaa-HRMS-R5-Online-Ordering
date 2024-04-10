<?php

use App\Http\Controllers\API\R5Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\H1Controller\H1APIController;
use App\Http\Controllers\R3Controller\R3Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user-order', [APIController::class, 'userOrder']);
Route::post('delete-from-r3-cart', [APIController::class, 'deleteCart']);
Route::post('delete-item-invoice', [APIController::class, 'deleteItem']);

//GET PAYMENT INFORMATION STORED BY R3 HRMS
Route::post('get-payment-orders', [APIController::class, 'paymentOrder']);

//H1 GET USERS 
Route::post('get-users', [H1APIController::class, 'getUsers']);


//SHARE THE USERS TO R3 PAYMENT
Route::get('share-user', [R3Controller::class, 'shareUser']);

//CHANGE THE ORDER STATUS 
Route::post('update-order-status', [APIController::class, 'updateStatus']);


//R5 API
Route::get('get-cart-accounts', [R5Controller::class, 'getCartAccounts']);
