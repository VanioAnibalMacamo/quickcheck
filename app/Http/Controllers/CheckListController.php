<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\CheckList;
use App\Models\Actividade;
use App\Models\Maquina;
use App\Models\Funcionario;
use App\Models\Pergunta;
use App\Models\TipoActividade;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();
        $perguntas = Pergunta::all();

        return view('checklists.create', compact('actividades', 'maquinas', 'funcionarios', 'perguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();
        
        $dadosRecebidos = session()->all();
        $actividade = Actividade::find($dadosRecebidos['actividade']);
        
        if ($actividade) {
            $tipoActividade = TipoActividade::findOrFail($actividade->tipo_actividade_id);
             $tipoActividadeId = $tipoActividade->id;

            $maquinaId = $dadosRecebidos['maquina'];
         
            $perguntas = Pergunta::whereHas('tipoActividades', function ($query) use ($tipoActividadeId) {
                $query->where('tipo_actividade_id', $tipoActividadeId);
            })->whereHas('maquinas', function ($query) use ($maquinaId) {
                $query->where('maquina_id', $maquinaId);
            })->get();$perguntas = Pergunta::where(function ($query) use ($maquinaId, $tipoActividadeId) {
                $query->where(function ($query) use ($maquinaId) {
                    $query->where('finalidade', 'maquina')
                          ->whereHas('maquinas', function ($query) use ($maquinaId) {
                              $query->where('maquina_id', $maquinaId);
                          });
                })->orWhere(function ($query) use ($tipoActividadeId) {
                    $query->where('finalidade', 'actividade')
                          ->whereHas('tipoActividades', function ($query) use ($tipoActividadeId) {
                              $query->where('tipo_actividade_id', $tipoActividadeId);
                          });
                });
            })->get();
            

            return view('checklists.create', compact('maquinas', 'funcionarios', 'perguntas', 'actividades', 'dadosRecebidos'));
        } else {
           
        }

    }
    
    public function preencher(Request $request)
    {
        $nome = $request->input('nome');
        $descricao = $request->input('descricao');
        $actividade = $request->input('actividade');
        $maquina = $request->input('maquina');
        $funcionario = $request->input('funcionario');
        
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'actividade' => $actividade,
            'maquina' => $maquina,
            'funcionario' => $funcionario
        ];
    
        return redirect()->route('checklists.create')->with($dados);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklist = new CheckList();
        $checklist->nome = $request->nome;
        $checklist->descricao = $request->descricao;
        $checklist->actividade_id = $request->actividade;
        $checklist->maquina_id = $request->maquina;
        $checklist->funcionario_id = $request->funcionario;
        $checklist->save();

        // Salvar as respostas das perguntas
        foreach ($request->perguntas as $perguntaId => $resposta) {
            $checklist->respostas()->create([
                'pergunta_id' => $perguntaId,
                'resposta' => $resposta,
            ]);
        }

        return redirect()->route('checklists.index')->with('success', 'CheckList criado com sucesso!');
    }

    public function search(Request $request)
    {
        $tipoAtividade = $request->input('tipoAtividade');
        $maquina = $request->input('maquina');

        // Consulte o banco de dados ou realize qualquer processamento necessário
        $results = DB::table('sua_tabela')
            ->where('tipo_atividade', $tipoAtividade)
            ->where('maquina', $maquina)
            ->get();

        return response()->json(['results' => $results]);
    }

    public function preenchimento()
    {
        //
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();
        $perguntas = Pergunta::all();

        return view('checklists.preenchimento', compact('actividades', 'maquinas', 'funcionarios', 'perguntas'));
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
