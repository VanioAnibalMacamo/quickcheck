<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    //

    
    public function index()
    {
        $areas = Area::paginate(8);
        return view('area.index',['areas' => $areas]);
    }
    public function create()
    {
        return view('area.create');
    }

    public function saveArea(Request $request){
        $area = new Area();
        
        $area->nome = $request->nome;
        $area->descricao = $request->descricao;
        $area->departamento_id=$request->departamento;

        $area->save();
        return redirect()->route('areaIndex')->with('mensagem', 'Área Cadastrada com sucesso!');
    }

    public function update_view($id){
        $area = Area :: find($id);
        return view('/area/edit', compact('area'));
    }

    public function update(Request $request, $id){

        $area = Area :: find($id);
        $area->nome = $request->nome;
        $area->descricao = $request->descricao;
        $area->departamento_id=$request->departamento;

        $area->save();
        return redirect()->route('areaIndex')->with('mensagem', 'Área Actualizada com sucesso!'); 
    }

    public function visualizar_view($id){
        $area = Area :: find($id);
        return view('/area/view', compact('area'));
    }

    public function delete($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect()->route('areaIndex')->with('successDelete', 'Área excluída com sucesso!');
    }

}
