<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesCT;
use App\Http\Controllers\ProductCT;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [GoogleAuthController::class, 'redirect']);
    Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);
});

    //product
    Route::post('/product',[ProductCT::class, 'store']);
    Route::get('/product',[ProductCT::class, 'showAll']);
    Route::get('/product/{id}',[ProductCT::class, 'showById']);
    Route::get('/product/search/name={name}',[ProductCT::class, 'showByName']);
    Route::put('product/{id}', [ProductCT::class, 'update']);
    Route::delete('product/{id}', [ProductCT::class,'delete']);
    Route::get('product/{id}/restore', [ProductCT::class, 'restore']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['jwt-auth'])->group(function(){

    //categories
    Route::post('/categories',[CategoriesCT::class, 'store']);
    Route::get('/categories',[CategoriesCT::class, 'showAll']);
    Route::get('/categories/{id}',[CategoriesCT::class, 'showById']);
    Route::get('/categories/search/name={name}',[CategoriesCT::class, 'showByName']);
    Route::put('categories/{id}', [CategoriesCT::class, 'update']);
    Route::delete('categories/{id}', [CategoriesCT::class,'delete']);
    Route::get('categories/{id}/restore', [CategoriesCT::class, 'restore']);
});