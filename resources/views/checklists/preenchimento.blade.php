@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CheckList</h1>
      
@stop

@section('content')
<div class="card card-primary">
@if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
<form action="{{url('preencher')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
        <label for="inputAddress">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do CheckList" required>
    </div>
    <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
        <label for="inputAddress">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição" required>
    </div>

    <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Actividade</label>
            <select id="actividadeInput" class="form-control" name='actividade' required>
                <option value="" selected>Seleccione...</option>
                @foreach ($actividades as $actividade)
                    <option value="{{ $actividade->id }}">{{ $actividade->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Máquina</label>
            <select id="maquinaInput" class="form-control" name="maquina" required>
                <option value="" selected>Seleccione...</option>
                @foreach ($maquinas as $maquina)
                    <option value="{{ $maquina->id }}">{{ $maquina->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Funcionário</label>
            <select id="inputState" class="form-control" name="funcionario" required>
                <option value="" selected>Seleccione...</option>
                @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer text-center">
        <input type="submit" class="btn btn-primary" value='Submeter'>
        <a  href="{{ url('/checkListIndex') }}" type="button" class="btn btn-warning">Voltar</a>
    </div>
</form>

<div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> console.log('Hi!'); </script>
    <script>
      setTimeout(function() {
          document.querySelector('.alert').remove();
      }, 5000);
</script>
    

@stop