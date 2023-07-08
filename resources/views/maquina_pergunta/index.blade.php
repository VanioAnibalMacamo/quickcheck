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

        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 15%">Máquina</th>
                      <th style="width: 60%">Perguntas</th>
                      <th style="width: 10%">N° Perguntas</th>
                      <th style="width: 10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($maquinas as $maquina)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $maquina->nome }}</td>
                      <td>
                          @foreach ($maquina->perguntas as $pergunta)
                            <span class="badge bg-primary">
                                  {{ $pergunta->descricao }}<br>
                          </span>
                          @endforeach
                      </td> 
                      <td>{{$maquina->perguntas->count()}}</td>         
                      <td> 
                           <a class="btn btn-info btn-sm d-inline"  href="{{url('update_maquinaPergunta',$maquina->id)}}"> <i class="fas fa-pencil-alt">Alocar</i></a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stop