@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
<h1>Alocação de Perguntas</h1>
      
@stop

@section('content')
<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('maquina_perguntaCreate') }}"  class="btn btn-primary">
    <i class="fas fa-plus"></i> Adicionar
  </a>
</div>
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 45%">Máquina</th>
                      <th style="width: 45%">Pergunta</th>
                      <th style="width: 20%"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($maquinas as $maquina)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
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
                   @endforeach
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
    <script>
      setTimeout(function() {
          document.querySelector('.alert').remove();
      }, 5000);
</script>
@stop