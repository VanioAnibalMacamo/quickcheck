<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maquina;
use App\Models\Departamento;

class MaquinaController extends Controller
{
    public function index()
    {
        $maquinas = Maquina::paginate(8);
        $departamentos = Departamento::all();

        return view('maquina.index',['maquinas' => $maquinas],['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maquina.create');
    }

    public function saveMaquina(Request $request){
        $maquina = new Maquina();

        $maquina->nome = $request->nome;
        $maquina->numero = $request->numero;
        $maquina->departamento_id = $request->departamento;
        $maquina->dataRegisto = $request->input('dataRegistro');

        $maquina->save();
        return redirect()->route('maquinaIndex')->with('mensagem', 'Máquina Cadastrada com sucesso!');
    }

    public function update_view($id){
        $maquina = Maquina :: find($id);
        return view('/maquina/edit', compact('maquina'));
    }

    public function update(Request $request, $id){

        $maquina = Maquina :: find($id);
        $maquina->nome = $request->nome;
        $maquina->numero = $request->numero;
        $maquina->departamento_id = $request->departamento;
        $maquina->dataRegisto = $request->input('dataRegistro');

        $maquina->save();
        return redirect()->route('maquinaIndex')->with('mensagem', 'Máquina Actualizada com sucesso!');
    }

    public function visualizar_view($id){
        $maquina = Maquina :: find($id);
        return view('/maquina/view', compact('maquina'));
    }

    public function delete($id)
    {
        $maquina = Maquina :: find($id);
        $maquina->delete();
       
        return redirect()->route('maquinaIndex')->with('successDelete', 'Máquina excluída com sucesso!');
    }
}
