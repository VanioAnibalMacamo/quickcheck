@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar Pergunta</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Pergunta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('updatePergunta',$pergunta->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Descrição (Pergunta)</label>
                        <input type="text" class="form-control" id="nome" name='descricao' value="{{ $pergunta->descricao }}"  placeholder="Digite a pergunta...">
                    </div>               
                   
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Actualizar'>
                        <a  href="{{ url('/perguntaIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
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