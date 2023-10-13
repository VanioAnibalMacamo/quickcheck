@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Editar  Área</h1>

@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Aréa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $actividade->nome }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $actividade->descricao }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipoActividade">Tipo de Atividade</label>
                        <input type="text" class="form-control" id="tipoActividade" name="tipoActividade" value="{{ $actividade->tipoActividade->nome }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="area">Área</label>
                        <input type="text" class="form-control" id="area" name="area" value="{{ $actividade->area->nome }}" readonly>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/actividadeIndex') }}" type="button" class="btn btn-warning">Voltar</a>
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
