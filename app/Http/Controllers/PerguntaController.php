<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    
     
    public function index()
    {
        $perguntas = Pergunta::paginate(8);
        return view('pergunta.index',['perguntas' => $perguntas]);
    }
    public function create()
    {
        return view('pergunta.create');
    }

    public function savePergunta(Request $request){
        $pergunta = new Pergunta();
       
        $pergunta->descricao  = $request->descricao;
        $pergunta->finalidade = $request->input('finalidade');

        $pergunta->save();
        return redirect()->route('perguntaIndex')->with('mensagem', 'Pergunta Cadastrada com sucesso!');
    }

    public function update_view($id){
        $pergunta = Pergunta :: find($id);
        return view('/pergunta/edit', compact('pergunta'));
    }

    public function update(Request $request, $id){
       
        $pergunta = Pergunta :: find($id);
        $pergunta->descricao  =$request->descricao;
        $pergunta = $request->input('finalidade');

        $pergunta->save();
        return redirect()->route('perguntaIndex')->with('mensagem', 'Pergunta Actualizada com sucesso!'); 
    }

    public function visualizar_view($id){
        $pergunta = Pergunta :: find($id);
        return view('/pergunta/view', compact('pergunta'));
    }

    public function delete($id)
    {
        $pergunta = Pergunta::find($id);
        $pergunta->delete();
       
        return redirect()->route('perguntaIndex')->with('successDelete', 'Pergunta excluída com sucesso!');
    }

}
