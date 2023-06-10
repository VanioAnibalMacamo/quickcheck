<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\CheckList;
use App\Models\Actividade;
use App\Models\Maquina;
use App\Models\Funcionario;
use App\Models\Pergunta;
use App\Models\TipoActividade;
use App\Models\Resposta;

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
        $checklists = CheckList::orderBy('id', 'desc')->paginate(8);
        return view('checklists.index',['checklists' => $checklists]);
    }
    public function visualizar_view($id){

        //
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();
       
        $checklist = CheckList :: find($id);
         $perguntas = Pergunta::all();

         $respostas = Resposta::where('checklist_id', $checklist->id)->get();
         $perguntas = $respostas->map(function ($resposta) {
             return $resposta->pergunta;
         });
        return view('/checklists/view', compact('checklist','actividades', 'maquinas', 'funcionarios', 'respostas'));
       // return view('/checklists/view', compact('checklist','actividades', 'maquinas', 'funcionarios', 'perguntas'));
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
   



    public function saveCheckList (Request $request)
    {
        // Crie um novo Checklist com os dados recebidos
        $checklist = new Checklist();
        $checklist->nome = $request->input('nome');
        $checklist->descricao = $request->input('descricao');
        $checklist->data = date('Y-m-d H:i:s'); // Define a data atual
        $checklist->funcionario_id = $request->input('funcionario');
        $checklist->actividade_id = $request->input('actividade');
        $checklist->maquina_id = $request->input('maquina');
        $checklist->save();

        // Salve as respostas para cada pergunta
        foreach ($request->input('perguntas') as $pergunta_id => $resposta) {
            $respostaChecklist = new Resposta();
            $respostaChecklist->nome = $resposta;
            $respostaChecklist->descricao = $request->input('perguntas_descricao')[$pergunta_id];
            $respostaChecklist->checklist_id = $checklist->id;
            $respostaChecklist->pergunta_id = $pergunta_id;
            $respostaChecklist->save();
        }

        // Redirecione para a página desejada ou retorne uma resposta JSON
        return redirect('preenchimento')->with('mensagem', 'Checklist salvo com sucesso!');
    }
    public function update_preenchimento_view($id){
      
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();
        $perguntas = Pergunta::all();
        $checklist = CheckList :: find($id);

        return view('checklists.edit_preenchimento', compact('actividades', 'maquinas', 'funcionarios', 'perguntas','checklist'));
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
