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
    <form action="{{ url('preencher') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <label for="inputAddress">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do CheckList" value="{{ $checklist->nome }}" disabled required>
        </div>
        <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <label for="inputAddress">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição" value="{{ $checklist->descricao }}" disabled required>
        </div>

        <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Actividade</label>
                <select id="atividadeInput" class="form-control" name="atividade" disabled required>
                    <option value="" selected disabled>Selecione...</option>
                    @foreach ($actividades as $actividade)
                        <option value="{{ $actividade->id }}" {{ $actividade->id == $checklist->actividade_id ? 'selected' : '' }}>{{ $actividade->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Máquina</label>
                <select id="maquinaInput" class="form-control" name="maquina" disabled required>
                    <option value="" selected disabled>Selecione...</option>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}" {{ $maquina->id == $checklist->maquina_id ? 'selected' : '' }}>{{ $maquina->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Funcionário</label>
                <select id="inputState" class="form-control" name="funcionario" disabled required>
                    <option value="" selected disabled>Selecione...</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ $funcionario->id == $checklist->funcionario_id ? 'selected' : '' }}>{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <!-- /.card-header -->
                <div class="card-body p-0">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Pergunta</th>
                            <th>Resposta</th>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    @foreach ($respostas as $resposta)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $resposta->pergunta->descricao }}</td>
                            <td>
                                <input type="text" class="form-control" name="respostas[{{ $resposta->pergunta->id }}]" value="{{ $resposta->nome == 'Sim' ? 'Sim' : 'Não' }}" disabled>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="respostas_descricao[{{ $resposta->pergunta->id }}]" placeholder="Sem Comentários" value="{{ $resposta->descricao }}" disabled>
                            </td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>

        <div class="card-footer text-center">
            <a href="{{ url('/checkListIndex') }}" type="button" class="btn btn-warning">Voltar</a>
            <a href="{{ route('download.pdf', ['id' => $checklist->id]) }}" type="button" class="btn btn-success">Download</a>
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
@stop
