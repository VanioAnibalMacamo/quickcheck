@extends('adminlte::page')

@section('title', 'Editar Checklist')

@section('content_header')
    <h1>Editar Checklist</h1>
@stop

@section('content')
<div class="card card-primary">
    @if (session('mensagem'))
        <div class="alert alert-success">{{ session('mensagem') }}</div>
    @endif
    @if (session('successDelete'))
        <div class="alert alert-danger">{{ session('successDelete') }}</div>
    @endif

    <form method="POST" action="{{url('updateChecklist',$checklist->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <label for="inputAddress">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $checklist->nome }}" required>
        </div>

        <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <label for="inputAddress">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $checklist->descricao }}" required>
        </div>

        <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Atividade</label>
                <select id="actividadeInput" class="form-control" name='actividade' disabled required>
                    <option value="" selected>Selecione...</option>
                    @foreach ($actividades as $actividade)
                        <option value="{{ $actividade->id }}" {{ $checklist->actividade_id == $actividade->id ? 'selected' : '' }}>{{ $actividade->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Máquina</label>
                <select id="maquinaInput" class="form-control" name="maquina" disabled required>
                    <option value="" selected>Selecione...</option>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}" {{ $checklist->maquina_id == $maquina->id ? 'selected' : '' }}>{{ $maquina->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Funcionário</label>
                <select id="inputState" class="form-control" name="funcionario" required>
                    <option value="" selected>Selecione...</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ $checklist->funcionario_id == $funcionario->id ? 'selected' : '' }}>{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer text-center">
            <input type="submit" class="btn btn-primary" value='Actualizar'>
        </div>
    </form>
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
        </div>
    </form>
</div>
</div>

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
@stop
