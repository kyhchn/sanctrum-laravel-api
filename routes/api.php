<?php

use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\InvoiceController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);
// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::put('/products/{id}', [ProductController::class, 'update']);
//     Route::delete('/products/{id}', [ProductController::class, 'destroy']);
// });;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\v1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



// Route::post('/products', function()->);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
