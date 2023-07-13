@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Cadastrar Pergunta</h1>

@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Pergunta</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('savePergunta')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="finalidade">Finalidade</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="finalidade" id="radioMaquina" value="maquina">
                                    <label class="form-check-label" for="radioMaquina">Máquina</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="finalidade" id="radioAtividade" value="actividade">
                                    <label class="form-check-label" for="radioAtividade">Tipo de Atividade</label>
                                </div>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="prioridade">Prioridade</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="radioBaixa" value="baixa">
                                <label class="form-check-label" for="radioBaixa">
                                    <span class="badge bg-primary">Baixa</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="radioMedia" value="media">
                                <label class="form-check-label" for="radioMedia">
                                    <span class="badge bg-warning text-dark">Média</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="radioAlta" value="alta">
                                <label class="form-check-label" for="radioAlta">
                                    <span class="badge bg-danger">Alta</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Descrição (Pergunta)</label>
                        <input type="text" class="form-control" id="nome" name='descricao' placeholder="Digite a pergunta...">
                    </div>

                    <div class="form-group">
                        <label for="resposta_optima">Resposta Óptima</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resposta_optima" id="radioSim" value="sim">
                                <label class="form-check-label" for="radioSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resposta_optima" id="radioNao" value="nao">
                                <label class="form-check-label" for="radioNao">Não</label>
                            </div>
                        </div>
                    </div>





                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Salvar'>
                        <a  href="{{ url('/perguntaIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
                    </div>
                </div>
              </form>

            <!-- /.card -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
