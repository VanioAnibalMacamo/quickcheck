<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class ActividadeController extends Controller
{

    public function index()
    {
        $actividades = Actividade::paginate(8);
        return view('actividade.index',['actividades' => $actividades]);
    }
    public function create()
    {
        return view('actividade.create');
    }

    public function saveActividade(Request $request){
        $actividade = new Actividade();

        $actividade->descricao  =$request->descricao;
        $actividade->nome  =$request->nome;
        $actividade->tipo_actividade_id=$request->tipoActividade;
        $actividade->area_id=$request->area;

        $actividade->save();
        return redirect()->route('actividadeIndex')->with('mensagem', 'Actividade Cadastrada com sucesso!');
    }

    public function update_view($id){
        $actividade = actividade :: find($id);
        return view('/actividade/edit', compact('actividade'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'tipoActividade' => 'required',
            'area' => 'required',
        ]);

        $actividade = Actividade::findOrFail($id);

        $actividade->nome = $request->input('nome');
        $actividade->descricao = $request->input('descricao');
        $actividade->tipo_actividade_id = $request->input('tipoActividade');
        $actividade->area_id = $request->input('area');

        $actividade->save();

        return redirect('/actividadeIndex')->with('mensagem', 'Actividade actualizada com sucesso.');
    }

    public function visualizar_view($id){
        $actividade = Actividade :: find($id);
        return view('/actividade/view', compact('actividade'));
    }

    public function delete($id)
    {
        $actividade = Actividade :: find($id);
        $actividade->delete();

        return redirect()->route('actividadeIndex')->with('successDelete', 'Actividade excluída com sucesso!');
    }
}
