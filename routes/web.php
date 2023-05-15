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

Route::get('/areaIndex', [App\Http\Controllers\AreaController::class, 'index'])->name('areaIndex');
Route::get('/areaCreate', [App\Http\Controllers\AreaController::class, 'create'])->name('areaCreate');
Route::post('/saveArea',[App\Http\Controllers\AreaController::class,'saveArea'])->middleware('web');
Route::get('/update_area/{id}',[App\Http\Controllers\AreaController::class,'update_view']);
Route::post('/updateArea/{id}',[App\Http\Controllers\AreaController::class,'update']);
Route::get('/visualizar_area/{id}',[App\Http\Controllers\AreaController::class,'visualizar_view']);
Route::delete('/area/{id}', 'App\Http\Controllers\AreaController@delete')->name('areas.delete');

Route::get('/maquinaIndex', [App\Http\Controllers\MaquinaController::class, 'index'])->name('maquinaIndex');
Route::get('/maquinaCreate', [App\Http\Controllers\MaquinaController::class, 'create'])->name('maquinaCreate');
Route::post('/saveMaquina',[App\Http\Controllers\MaquinaController::class,'saveMaquina'])->middleware('web');
Route::get('/update_maquina/{id}',[App\Http\Controllers\MaquinaController::class,'update_view']);
Route::post('/updateMaquina/{id}',[App\Http\Controllers\MaquinaController::class,'update']);
Route::get('/visualizar_maquina/{id}',[App\Http\Controllers\MaquinaController::class,'visualizar_view']);
Route::delete('/maquina/{id}', 'App\Http\Controllers\MaquinaController@delete')->name('maquina.delete');

Route::get('/tipoActividadeIndex', [App\Http\Controllers\TipoActividadeController::class, 'index'])->name('tipoActividadeIndex');
Route::get('/tipoActividadeCreate', [App\Http\Controllers\TipoActividadeController::class, 'create'])->name('tipoActividadeCreate');
Route::post('/saveTipoActividade',[App\Http\Controllers\TipoActividadeController::class,'saveTipoActividade'])->middleware('web');
Route::get('/update_tipoActividade/{id}',[App\Http\Controllers\TipoActividadeController::class,'update_view']);
Route::post('/updateTipoActividade/{id}',[App\Http\Controllers\TipoActividadeController::class,'update']);
Route::get('/visualizar_tipoActividade/{id}',[App\Http\Controllers\TipoActividadeController::class,'visualizar_view']);
Route::delete('/tipoActividade/{id}', 'App\Http\Controllers\TipoActividadeController@delete')->name('tipoActividades.delete');

Route::get('/actividadeIndex', [App\Http\Controllers\ActividadeController::class, 'index'])->name('actividadeIndex');
Route::get('/actividadeCreate', [App\Http\Controllers\ActividadeController::class, 'create'])->name('actividadeCreate');
Route::post('/saveActividade',[App\Http\Controllers\ActividadeController::class,'saveActividade'])->middleware('web');
Route::get('/update_actividade/{id}',[App\Http\Controllers\ActividadeController::class,'update_view']);
Route::post('/updateActividade/{id}',[App\Http\Controllers\ActividadeController::class,'update']);
Route::get('/visualizar_actividade/{id}',[App\Http\Controllers\ActividadeController::class,'visualizar_view']);
Route::delete('/actividade/{id}', 'App\Http\Controllers\ActividadeController@delete')->name('actividade.delete');

Route::get('/perguntaIndex', [App\Http\Controllers\PerguntaController::class, 'index'])->name('perguntaIndex');
Route::get('/perguntaCreate', [App\Http\Controllers\PerguntaController::class, 'create'])->name('perguntaCreate');
Route::post('/savePergunta',[App\Http\Controllers\PerguntaController::class,'savePergunta'])->middleware('web');
Route::get('/update_pergunta/{id}',[App\Http\Controllers\PerguntaController::class,'update_view']);
Route::post('/updatePergunta/{id}',[App\Http\Controllers\PerguntaController::class,'update']);
Route::get('/visualizar_pergunta/{id}',[App\Http\Controllers\PerguntaController::class,'visualizar_view']);
Route::delete('/pergunta/{id}', 'App\Http\Controllers\PerguntaController@delete')->name('perguntas.delete');



