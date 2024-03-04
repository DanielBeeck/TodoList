<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
Route::get('/', [TodoController::class, 'index']);

Route::post('/insertTupel', [TodoController::class, 'insertTupel']);

// Route::post('/', 'TodoController@updateStatus')->name('updateStatus');
//
Route::get("/edit/{id}", [TodoController::class, 'edit']);

Route::patch('/todo/{id}', [TodoController::class, 'update']);

Route::patch('/todo/Status/{id}', [TodoController::class, 'updateStatus']);

Route::delete('/{id}', [TodoController::class, 'destroy']);
