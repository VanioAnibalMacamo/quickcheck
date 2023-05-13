@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Cadastrar Máquina</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Máquina</h3>
              </div>
              <!-- /.card-header 
            <th style="width: 10px">#</th>
                      <th>Nome</th>
                      <th>Número Máquina</th>
                      <th>Data Registo</th>
                      <th>departamento</th>
            
            -->
              <!-- form start -->
              <form action="{{url('saveMaquina')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="nome" name='nome' placeholder="Digite o nome da Máquina...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Número Máquina</label>
                        <input type="text" class="form-control" id="descricao" name='numero' placeholder="Digite o número da Máquina">
                        </div>
                        <div class="form-group col-md-6">
                        
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\Departamento::all() as $departamento)
                                 <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                             @endforeach
                        </select>
                        </div>
                    </div>
                   <!-- Date and time -->
                <div class="form-group">
                  <label>Data de Registo:</label> </br>
                  <input type="date" name="datarEGISTO" min="1900-01-01" max="2023-12-31" value="2000-01-01">
                </div>
                   
                   
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Salvar'>
                        <a  href="{{ url('/areaIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
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