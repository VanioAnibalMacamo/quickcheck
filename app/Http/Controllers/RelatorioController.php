<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


use App\Models\CheckList;
use App\Models\Actividade;
use App\Models\Maquina;
use App\Models\Funcionario;
use App\Models\Pergunta;
use App\Models\TipoActividade;
use App\Models\Resposta;

class RelatorioController extends Controller
{
    //
    public function index()
    {
         $dadosChecklists = DB::table('checklists')
            ->join('respostas', 'checklists.id', '=', 'respostas.checklist_id')
            ->join('perguntas', 'respostas.pergunta_id', '=', 'perguntas.id')
            ->join('funcionarios', 'checklists.funcionario_id', '=', 'funcionarios.id')
            ->join('actividades', 'checklists.actividade_id', '=', 'actividades.id')
            ->join('maquinas', 'checklists.maquina_id', '=', 'maquinas.id')
            ->where('checklists.status', '=', 'Pendente')
            ->whereRaw('LOWER(perguntas.resposta_optima) <> LOWER(respostas.nome)')
            ->where('perguntas.prioridade', '=', 'alta')
            ->select(
                'checklists.nome as nome_checklist',
                'perguntas.descricao as pergunta_descricao',
                'perguntas.resposta_optima as resposta_optima',
                'funcionarios.nome as nome_funcionario',
                'actividades.nome as nome_actividade',
                'maquinas.nome as nome_maquina',
                'respostas.descricao as comentario',
                'respostas.nome as resposta',
                'checklists.data'
            )
            ->orderBy('checklists.id', 'desc')
            ->paginate(15);

        return view('relatorio.index', ['dadosChecklists' => $dadosChecklists]);
    }
}
