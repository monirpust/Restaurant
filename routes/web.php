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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [HomeController::class, 'index']);

Route::get("/users", [BackendController::class, 'user']);

Route::get("/foodmenu", [BackendController::class, 'foodmenu']);

Route::post("/uploadfood", [BackendController::class, 'uploadfood']);

Route::get("/remove/{id}", [BackendController::class, 'remove']);

Route::get("/redirects", [HomeController::class, 'redirects']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
