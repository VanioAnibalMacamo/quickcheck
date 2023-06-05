@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CheckList</h1>
      
@stop

@section('content')
<div class="card card-primary">
         <form action="{{ route('checklists.store') }}" method="POST">
            @csrf

            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do CheckList">
            </div>
            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                 <label for="inputAddress">Descrição</label>
                 <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição">
            </div>

            <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                    <div class="form-group col-md-4">
                            <label for="inputEmail4">Actividade</label>
                            <select id="actividadeInput" class="form-control" name='actividade'>
                                <option selected>Seleccione...</option>
                                @foreach ($actividades as $actividade)
                                    <option value="{{ $actividade->id }}">{{ $actividade->nome }}</option>
                                @endforeach
                            </select>
                            
                    </div>
                    <div class="form-group col-md-4" >
                            <label for="inputEmail4">Máquina</label>
                            <select id="maquinaInput" class="form-control"  name="maquina">
                                <option selected>Seleccione...</option>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{ $maquina->nome }}</option>
                                @endforeach
                            </select>  
                    </div>
                    <div class="form-group col-md-4" >
                            <label for="inputEmail4">Funcionário</label>
                            <select id="inputState" class="form-control"  name="funcionario">
                                <option selected>Seleccione...</option>
                                @foreach ($funcionarios as $funcionario)
                                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                                @endforeach
                            </select>  
                    </div>   
             </div>
             <div class="card-footer text-center">
                <button id="searchButton" class="btn btn-success">Pesquisar</button>
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
                    @foreach ($perguntas as $pergunta)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $pergunta->descricao }}</td>
                        <td>
                            <label>
                                <input type="radio" name="perguntas[{{ $pergunta->id }}]" value="Opção 1"> Sim
                            </label>
                            <label>
                                <input type="radio" name="perguntas[{{ $pergunta->id }}]" value="Opção 2"> Não
                            </label>
                        </td>
                        <td>
                        <input type="text" class="form-control" id="descricao"  name="perguntas[{{ $pergunta->id }}]" placeholder="Comentário">
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>

            <div class="card-footer">
                     <input type="submit" class="btn btn-primary" value='Salvar'>
                    <a  href="{{ url('/funcIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
             </div>
        </form>
<div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function(event) {
                event.preventDefault(); 
              
                // Obter os valores dos campos de entrada
                var actividade = $('#actividadeInput').val();
                var maquina = $('#maquinaInput').val();
               
                // Enviar os dados para o controlador Laravel via AJAX
                $.ajax({
                    url: '{{ route('search') }}',
                    type: 'POST',
                    data: {
                        actividade: actividade,
                        maquina: maquina
                    },
                    success: function(response) {
                    var results = response.results;

                    // Limpar a tabela antes de atualizar com os novos resultados
                    $('#resultsTable tbody').empty();

                    // Adicionar cada resultado como uma nova linha na tabela
                    results.forEach(function(result) {
                        var row = '<tr>' +
                            '<td>' + result.id + '</td>' +
                            '<td>' + result.nome + '</td>' +
                            '<td>' + result.data + '</td>' +
                            '</tr>';
                        $('#resultsTable tbody').append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
                });
            });
        });
    </script>

@stop