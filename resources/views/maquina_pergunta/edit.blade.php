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
                      <th style="width: 10px">#</th>
                      <th>Máquina</th>
                      <th>Perguntas</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>1</td>
                      <td>{{ $maquina->nome }}</td>
                        <td>
                            @foreach ($maquina->perguntas as $pergunta)
                                {{ $pergunta->descricao }}<br>
                            @endforeach
                        </td>
                      <td> 
                           
                            <a  class="btn btn-primary btn-sm d-inline" href="{{url('visualizar_maquinaPergunta',$maquina->id)}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-info btn-sm d-inline"  href="{{url('update_maquinaPergunta',$maquina->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                            <form id="form-excluir" action="{{ route('maquina_perguntas.delete', ['id' => $maquina->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir a Área {{ $maquina->nome }}?')"><i class="fas fa-trash"> </i></button>
                            </form>
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