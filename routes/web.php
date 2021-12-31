<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;

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


Route::get("/", [HomeController::class, 'index']);

Route::get("/users", [BackendController::class, 'user']);

Route::get("/foodmenu", [BackendController::class, 'foodmenu']);

Route::post("/uploadfood", [BackendController::class, 'uploadfood']);

Route::get("/remove/{id}", [BackendController::class, 'remove']);

Route::get("/removefood/{id}", [BackendController::class, 'removefood']);

Route::get("/updatefood/{id}", [BackendController::class, 'updatefood']);

Route::post("/savefood/{id}", [BackendController::class, 'savefood']);

Route::get("/redirects", [HomeController::class, 'redirects']);

Route::get("/showreservation", [BackendController::class, 'showreservation']);

Route::get("/showchef", [BackendController::class, 'showchef']);

Route::post("/addchef", [BackendController::class, 'addchef']);

Route::get("/editchef/{id}", [BackendController::class, 'editchef']);

Route::post("/updatechef/{id}", [BackendController::class, 'updatechef']);

Route::get("/removechef/{id}", [BackendController::class, 'removechef']);

Route::post("/addtocart/{id}", [HomeController::class, 'addtocart']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
