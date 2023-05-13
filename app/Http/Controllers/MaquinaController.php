<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maquina;

class MaquinaController extends Controller
{
    public function index()
    {
        $maquinas = Maquina::paginate(8);
        return view('maquina.index',['maquinas' => $maquinas]);
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
}
