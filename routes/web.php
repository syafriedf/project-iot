<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WoController;
use App\Http\Controllers\LineController;
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

Route::get('/home', [LineController::class, 'index']);
Route::view('/login', 'auth.login');

Route::resource('operator', OperatorController::class);
//Route::resource('test', [OperatorController::class, 'edit']);
Route::resource('machine', MachineController::class);
Route::resource('status', StatusController::class);
Route::resource('workorder', WoController::class);


