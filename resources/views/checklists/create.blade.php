@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CheckList</h1>

@stop

@section('content')
<div class="card card-primary">

    <form action="{{url('saveCheckList')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $dadosRecebidos['nome'] ?? '' }}" readonly>
            </div>
            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <label for="inputAddress">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $dadosRecebidos['descricao'] ?? '' }}" readonly>
            </div>

        <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Actividade</label>
                <select id="actividadeInput" class="form-control" name="actividade" readonly>
                    @foreach ($actividades as $actividade)
                        <option value="{{ $actividade->id }}" {{ $actividade->id == $dadosRecebidos['actividade'] ? 'selected' : '' }}>
                            {{ $actividade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Máquina</label>
                <select id="maquinaInput" class="form-control" name="maquina" readonly>
                    @foreach ($maquinas as $maquina)
                        <option value="{{ $maquina->id }}" {{ $maquina->id == $dadosRecebidos['maquina'] ? 'selected' : '' }}>
                            {{ $maquina->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Funcionário</label>
                <select id="inputState" class="form-control" name="funcionario" readonly>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ $funcionario->id == $dadosRecebidos['funcionario'] ? 'selected' : '' }}>
                            {{ $funcionario->nome }}
                        </option>
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
                    @php
                        // Ordenar as perguntas por finalidade
                        $perguntasOrdenadas = $perguntas->sortBy('finalidade');
                        // Variável para armazenar a finalidade atual
                        $finalidadeAtual = null;
                    @endphp
                    @foreach ($perguntasOrdenadas as $pergunta)
                    @if ($pergunta->finalidade != $finalidadeAtual)
                        <tr>
                            <th colspan="4" class="text-center" style="background-color: #e9ecef; color: #333;">
                                Perguntas sobre {{ $pergunta->finalidade }}s
                            </th>
                        </tr>
                        @php
                            $finalidadeAtual = $pergunta->finalidade;
                        @endphp
                    @endif

                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $pergunta->descricao }}</td>
                        <td>
                            <label>
                                <input type="radio" name="perguntas[{{ $pergunta->id }}]" value="Sim" required> Sim
                            </label>
                            <label>
                                <input type="radio" name="perguntas[{{ $pergunta->id }}]" value="Nao" required> Não
                            </label>
                        </td>
                        <td>
                            @if ($pergunta->prioridade == 'alta')
                              <div style="position: relative;">
                                <input type="text" class="form-control descricao-input required" id="descricao" name="perguntas_descricao[{{ $pergunta->id }}]" placeholder="Comentário" required>
                                <span style="position: absolute; top: 0; right: -10px; color: red;">*</span>
                              </div>
                            @else
                              <input type="text" class="form-control descricao-input" id="descricao" name="perguntas_descricao[{{ $pergunta->id }}]" placeholder="Comentário">
                            @endif
                          </td>
                    </tr>
                    @endforeach

                </table>
                </div>
            </div>

            <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value='Salvar'>
                    <a  href="{{ url('/preenchimento') }}" type="button" class="btn btn-warning">Cancelar</a>
             </div>
        </form>
<div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">4

    <style>
        .required {
            position: relative;
        }

        .required::after {
            content: "*";
            position: absolute;
            top: 0;
            right: -10px;
            color: red;
        }
      </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
