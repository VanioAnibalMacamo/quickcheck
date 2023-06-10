<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Models\User;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/userIndex',function(){
    $users = User::all(); 
    return view('users.index',compact('users'));
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
Route::delete('/departamento/{id}', 'App\Http\Controllers\DepartamentoController@delete')->name('departamentos.delete');


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
Route::delete('/actividade/{id}', 'App\Http\Controllers\ActividadeController@delete')->name('actividades.delete');

Route::get('/perguntaIndex', [App\Http\Controllers\PerguntaController::class, 'index'])->name('perguntaIndex');
Route::get('/perguntaCreate', [App\Http\Controllers\PerguntaController::class, 'create'])->name('perguntaCreate');
Route::post('/savePergunta',[App\Http\Controllers\PerguntaController::class,'savePergunta'])->middleware('web');
Route::get('/update_pergunta/{id}',[App\Http\Controllers\PerguntaController::class,'update_view']);
Route::post('/updatePergunta/{id}',[App\Http\Controllers\PerguntaController::class,'update']);
Route::get('/visualizar_pergunta/{id}',[App\Http\Controllers\PerguntaController::class,'visualizar_view']);
Route::delete('/pergunta/{id}', 'App\Http\Controllers\PerguntaController@delete')->name('perguntas.delete');

Route::get('/maquina_perguntaIndex', [App\Http\Controllers\MaquinaPerguntaController::class, 'index'])->name('maquina_perguntaIndex');
Route::get('/maquina_perguntaCreate', [App\Http\Controllers\MaquinaPerguntaController::class, 'create'])->name('maquina_perguntaCreate');
Route::post('/saveMaquinaPergunta',[App\Http\Controllers\MaquinaPerguntaController::class,'savePergunta'])->middleware('web');
Route::get('/update_maquinaPergunta/{id}',[App\Http\Controllers\MaquinaPerguntaController::class,'update_view']);
Route::post('/updateMaquinaPergunta/{id}',[App\Http\Controllers\MaquinaPerguntaController::class,'update']);
Route::get('/visualizar_maquinaPergunta/{id}',[App\Http\Controllers\MaquinaPerguntaController::class,'visualizar_view']);
Route::delete('/maquinaPergunta/{id}', 'App\Http\Controllers\MaquinaPerguntaController@delete')->name('maquina_perguntas.delete');
Route::post('/maquina/{maquina}/salvar-perguntas', 'App\Http\Controllers\MaquinaPerguntaController@salvarPerguntas')->name('maquina.salvar-perguntas');

Route::get('/tipo_actividade_perguntaIndex', [App\Http\Controllers\TipoActividadePerguntaController::class, 'index'])->name('tipo_actividade_perguntaIndex');
Route::get('/update_tipoActividadePergunta/{id}',[App\Http\Controllers\TipoActividadePerguntaController::class,'update_view']);
Route::post('/tipoActividade/{tipoAactividade}/salvar-perguntas', 'App\Http\Controllers\TipoActividadePerguntaController@salvarPerguntas')->name('tipoActividade.salvar-perguntas');

Route::get('/checkListIndex', [App\Http\Controllers\CheckListController::class, 'index'])->name('checkListIndex');
Route::resource('checklists', 'App\Http\Controllers\CheckListController');
Route::post('App\Http\Controllers\CheckListController', 'checklistController@search')->name('search');
Route::get('/preenchimento',[App\Http\Controllers\CheckListController::class, 'preenchimento'])->name('preenchimento');
Route::post('/preencher', 'App\Http\Controllers\CheckListController@preencher')->name('receber.dados');
Route::post('/saveCheckList',[App\Http\Controllers\CheckListController::class,'saveCheckList'])->middleware('web');
Route::get('/visualizar_checklist/{id}',[App\Http\Controllers\CheckListController::class,'visualizar_view']);
Route::get('/update_preenchimento_checklist/{id}',[App\Http\Controllers\CheckListController::class,'update_preenchimento_view']);
Route::get('/actualizar_checklist/{id}',[App\Http\Controllers\CheckListController::class,'actualizar_view']);
Route::any('/updateChecklist/{id}',[App\Http\Controllers\CheckListController::class,'update']);
Route::delete('/checklist/{id}', 'App\Http\Controllers\CheckListController@delete')->name('checklists.delete');
