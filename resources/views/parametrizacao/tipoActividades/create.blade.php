@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Cadastrar Tipo de Actividade</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados do Tipo de Actividade</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('saveTipoActividade')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="nome" name='nome' placeholder="Digite o nome da Actividade...">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name='descricao' placeholder="Digite a Descrição da Actividade...">
                    </div>
                                     
                   
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Salvar'>
                        <a  href="{{ url('/tipoActividadeIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
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