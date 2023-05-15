@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Perguntas</h1>
      
@stop

@section('content')

<div class="row">
    <div class="col-md-4">
        @foreach ($perguntas->chunk(ceil($perguntas->count() / 2))->first() as $pergunta)
            <div class="checkbox mb-2">
                <label class="d-flex align-items-center">
                    <input type="checkbox" name="pergunta_ids[]" value="{{ $pergunta->id }}" class="mr-2">
                    {{ $pergunta->descricao }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach ($perguntas->chunk(ceil($perguntas->count() / 2))->last() as $pergunta)
            <div class="checkbox mb-2">
                <label class="d-flex align-items-center">
                    <input type="checkbox" name="pergunta_ids[]" value="{{ $pergunta->id }}" class="mr-2">
                    {{ $pergunta->descricao }}
                </label>
            </div>
        @endforeach
    </div>
</div>
<div class="d-flex align-items-end mb-3">
  <a href="{{ url('maquina_perguntaCreate') }}"  class="btn btn-primary ml-auto">
    <i class="fas fa-plus"></i> Adicionar Perguntas
  </a>
</div>




<div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 40%">Máquina</th>
                      <th>Perguntas</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>{{ $maquina->nome }}</td>
                        <td>
                            @foreach ($maquina->perguntas as $pergunta)
                                {{ $pergunta->descricao }}<br>
                            @endforeach
                        </td>
                                        
                    </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>



       

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop