<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

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

Route::get('/form', [ContactController::class, 'add']);

Route::post('/create', [ContactController::class, 'create']);

Route::post('/register', [ContactController::class, 'register']);

Route::post('/revise', [ContactController::class, 'revise']);

Route::get('/select', [ContactController::class, 'select']);

Route::post('/delete', [ContactController::class, 'delete']);

Route::get('/control', [ContactController::class, 'control']);



