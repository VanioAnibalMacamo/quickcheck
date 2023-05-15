<?php

namespace App\Http\Controllers;
use App\Models\Maquina;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class MaquinaPerguntaController extends Controller
{
    public function index()
    {
        $maquinas = Maquina::with('perguntas')->get();
        return view('maquina_pergunta.index', compact('maquinas'));
    }
    public function create()
    {   $maquinas = Maquina::all();
        $perguntas = Pergunta::all();
        return view('maquina_pergunta.create', compact('maquinas', 'perguntas'));
    }

    public function saveMaquinaPergunta(Request $request){
        
        $maquina = Maquina::find($request->input('maquina_id'));
        $maquina->perguntas()->attach($request->input('pergunta_ids'));

        return redirect()->route('maquina_pergunta.index')->with('success', 'Relacionamento entre máquina e perguntas criado com sucesso.');
    }

    public function update_view($id){
        $maquina = Maquina::find($id);
        $perguntas = Pergunta::all();
        return view('/maquina_pergunta/edit', compact('maquina','perguntas'));
    }
}
