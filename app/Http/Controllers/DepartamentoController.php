<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    //

    public function index()
    {
       
        $departamentos = Departamento::paginate(8);
        return view('departamento.index',['departamentos' => $departamentos]);
    }
}
