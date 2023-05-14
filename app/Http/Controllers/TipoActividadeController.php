<?php

namespace App\Http\Controllers;

use App\Models\TipoActividade;
use Illuminate\Http\Request;

class TipoActividadeController extends Controller
{
    public function index()
    {
        $tipoActividades = TipoActividade::paginate(8);
        return view('parametrizacao.tipoActividades.index',['tipoActividades' => $tipoActividades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrizacao.tipoActividades.create');
    }

    public function saveTipoActividade(Request $request){
        $tipoActividades = new TipoActividade();

        $tipoActividades->nome = $request->nome;
        $tipoActividades->descricao=$request->descricao;

        $tipoActividades->save();
        return redirect()->route('tipoActividadeIndex')->with('mensagem', 'Tipo de Actividade Cadastrado com sucesso!');
    }

    public function update_view($id){
        $tipoActividades = TipoActividade :: find($id);
        return view('parametrizacao.tipoActividades.edit', compact('tipoActividades'));
    }

    public function update(Request $request, $id){

        $tipoActividades = TipoActividade :: find($id);
        $tipoActividades->nome = $request->nome;
        $tipoActividades->descricao=$request->descricao;

        $tipoActividades->save();
        return redirect()->route('tipoActividadeIndex')->with('mensagem', 'Tipo de Actividade Actualizado com sucesso!');
    }

    public function visualizar_view($id){
        $tipoActividades = TipoActividade :: find($id);
        return view('parametrizacao.tipoActividades.view', compact('tipoActividades'));
    }

    public function delete($id)
    {
        $tipoActividades = TipoActividade :: find($id);
        $tipoActividades->delete();
       
        return redirect()->route('tipoActividadeIndex')->with('successDelete', 'Tipo de Actividade excluída com sucesso!');
    }
}
