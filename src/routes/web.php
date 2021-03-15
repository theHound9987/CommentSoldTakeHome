<?php

use App\Http\Controllers\GetHomeController;
use App\Http\Controllers\GetProductsController;
use App\Http\Controllers\Inventory\GetInventoryByProductIdController;
use App\Http\Controllers\Inventory\GetInventoryBySKUController;
use App\Http\Controllers\Inventory\GetInventoryController;
use App\Http\Controllers\Login\GetLoginController;
use App\Http\Controllers\Login\PostLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("login",GetLoginController::class);
Route::post("login", PostLoginController::class);

Route::get("/home", GetHomeController::class);

Route::get("/products", GetProductsController::class);

Route::get("/inventory", GetInventoryController::class);
Route::get("/inventory/product/{id}", GetInventoryByProductIdController::class);
Route::get("/inventory/sku/{id}", GetInventoryBySKUController::class);
