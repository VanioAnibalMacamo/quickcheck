@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Cadastrar Área</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Aréa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('updateArea',$area->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $area->nome }}" placeholder="Digite o nome da Área..." readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name='descricao' value="{{ $area->descricao }}"  placeholder="Digite a descrição da Área..." readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento' readonly>
                            <option selected>Seleccione...</option>
                            
                            @foreach(App\Models\Departamento::all() as $departamento)
                                 <option value="{{ $departamento->id }}" @if($departamento->id === $area->departamento_id) selected @endif> {{ $departamento->nome }}</option>
                             @endforeach
                        </select>
                        </div>
                    </div>
                   
                   
                    <div class="card-footer">
                        <a  href="{{ url('/areaIndex') }}" type="button" class="btn btn-warning">Voltar</a>
                    </div>
              </form>
            </div>
            <!-- /.card -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop