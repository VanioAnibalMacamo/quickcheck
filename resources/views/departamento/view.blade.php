@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visualizar Departamentos</h1>
@stop

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados do Departamento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('saveDep')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                        <label for="inputAddress">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $departamento->nome }}" placeholder="Digite o nome do Departamento..."readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name='sigla' value="{{ $departamento->sigla }}" placeholder="ex: GRH"readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Descricao</label>
                        <input type="text" class="form-control" id="descricao" name='descricao' value="{{ $departamento->descricao }}"placeholder="ex: Estamos todos juntos"readonly>
                        </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento' readonly>
                            <option selected>Seleccione...</option>

                        
                        </select>
                        </div>

                        <div class="card-footer">
                    
                        <a  href="{{ url('/depIndex') }}" type="button" class="btn btn-warning">Voltar</a>
                    </div>
                    
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
