<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/userIndex',function(){
    return view('users.index');
})->middleware(['auth'])->name('userIndex');

Route::get('/funcIndex', [App\Http\Controllers\FuncionarioController::class, 'index'])->name('funcIndex');
Route::get('/funcCreate', [App\Http\Controllers\FuncionarioController::class, 'create'])->name('funcCreate');
Route::post('/saveFunc',[App\Http\Controllers\FuncionarioController::class,'saveFunc'])->middleware('web');
Route::get('/update_funcionario/{id}',[App\Http\Controllers\FuncionarioController::class,'update_view']);
Route::post('/update/{id}',[App\Http\Controllers\FuncionarioController::class,'update']);
//MVVM
Route::delete('/funcionarios/{id}', 'App\Http\Controllers\FuncionarioController@delete')->name('funcionarios.delete');


Route::get('/depIndex', [App\Http\Controllers\DepartamentoController::class, 'index'])->name('depIndex');
Route::get('/depCreate', [App\Http\Controllers\DepartamentoController::class, 'create'])->name('depCreate');
Route::post('/saveDep',[App\Http\Controllers\DepartamentoController::class,'saveDep'])->middleware('web');
Route::get('/update_departamento/{id}',[App\Http\Controllers\DepartamentoController::class,'update_view']);
Route::post('/updateDep/{id}',[App\Http\Controllers\DepartamentoController::class,'update']);
Route::get('/visualizar_departamento/{id}',[App\Http\Controllers\DepartamentoController::class,'visualizar_view']);
Route::post('/visualizarDep/{id}',[App\Http\Controllers\DepartamentoController::class,'visualizar']);