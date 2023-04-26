<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::paginate(8);
        return view('funcionario.index',['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
    }
    public function saveFunc(Request $request){

        // Crie um novo registro de funcionário a partir dos dados da solicitação
        //$funcionario = new Funcionario($request->all());
        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->nome.$request->email);
        $user->save();

        $funcionario = new Funcionario();
        $funcionario->nome=$request->nome;
        $funcionario->morada=$request->morada;
        $funcionario->email=$request->email;
        $funcionario->contacto=$request->contacto;
        $funcionario->genero=$request->genero;
        $funcionario->num_bi=$request->num_bi;
        $funcionario->user_id= $user->id;
        $funcionario->departamento_id=$request->departamento;
        $funcionario->tipo_id=$request->tipo_doc;
        $funcionario->save();

        return redirect()->route('funcIndex')->with('mensagem', 'Funcionário Cadastrado com sucesso!');
    }
    public function update_view($id){
        $funcionario = Funcionario :: find($id);
        return view('/funcionario/edit', compact('funcionario'));
    }
   
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $funcionario = Funcionario :: find($id);
        $users =  User::all();
       
        foreach ($users as $user) {
            if($funcionario->user_id == $user->id){
                $user->name = $request->nome;
                $user->email = $request->email;
                $user->password = Hash::make($request->nome.$request->email);
                $user->save();

                $funcionario->nome=$request->nome;
                $funcionario->morada=$request->morada;
                $funcionario->email=$request->email;
                $funcionario->contacto=$request->contacto;
                $funcionario->genero=$request->genero;
                $funcionario->num_bi=$request->num_bi;
                $funcionario->user_id= $user->id;
                $funcionario->departamento_id=$request->departamento;
                $funcionario->tipo_id=$request->tipo_doc;
                $funcionario->save();

                return redirect()->route('funcIndex')->with('mensagem', 'Funcionário Actualizado com sucesso!');
            }
        }
       
       
    }
    public function delete($id)
    {
        $funcionario = Funcionario::find($id);
        $users =  User::all();
       
        foreach ($users as $user) {
            if($funcionario->user_id == $user->id){
                $funcionario->delete();
                $user->delete();
            }
        }
        return redirect()->route('funcIndex')->with('successDelete', 'Funcionario excluído com sucesso!');
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
