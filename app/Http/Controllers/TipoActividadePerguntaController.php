<?php

namespace App\Http\Controllers;
use App\Models\TipoActividade;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class TipoActividadePerguntaController extends Controller
{
    
    public function index()
    {
        $tipoActividades = TipoActividade::with('perguntas')->get();
        return view('tipo_actividade_pergunta.index', compact('tipoActividades'));
    }

    public function update_view($id){
        $tipoActividade = TipoActividade::find($id);
        $perguntas = Pergunta::where('finalidade', 'actividade')->get();

        return view('/tipo_actividade_pergunta/edit', compact('tipoActividade','perguntas'));
    }

    public function saveMaquinaPergunta(Request $request){
        
        $tipoActividade = TipoActividade::find($request->input('tipoActividade_id'));
        $tipoActividade->perguntas()->attach($request->input('pergunta_ids'));

        return redirect()->route('maquina_pergunta.index')->with('success', 'Relacionamento entre máquina e perguntas criado com sucesso.');
    }

    public function salvarPerguntas(Request $request, TipoActividade $tipoActividade)
    {
        $tipoActividadeId = $request->input('tipo_actividade_id');
        $perguntaIds = $request->input('pergunta_ids', []);

        $tipoActividade = TipoActividade::find($tipoActividadeId);
        $tipoActividade->perguntas()->sync($perguntaIds);

        return redirect()->back()->with('success', 'Perguntas salvas com sucesso.');
    }

}
