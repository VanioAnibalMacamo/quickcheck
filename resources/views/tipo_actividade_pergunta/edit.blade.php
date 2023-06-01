@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Alocar perguntas à : {{ $tipoActividade->nome }} </h1>
      
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
         <h3 class="card-title">Perguntas</h3>
    </div>
    <form action="{{ route('tipoActividade.salvar-perguntas', $tipoActividade) }}" method="post" class="pl-5">
        @csrf
         <input type="hidden" name="tipo_actividade_id" value="{{ $tipoActividade->id }}"> 
 
        <div class="row">
          <div class="col-md-4">
            @foreach ($perguntas->chunk(ceil($perguntas->count() / 2))->first() as $pergunta)
              <div class="checkbox mb-2">
                <label class="d-flex align-items-center">
                  <input type="checkbox" name="pergunta_ids[]" value="{{ $pergunta->id }}" class="mr-3" @if($tipoActividade->perguntas->contains('id', $pergunta->id)) checked @endif>
                  {{ $pergunta->descricao }}
                </label>
              </div>
            @endforeach
          </div>
          <div class="col-md-4">
            @foreach ($perguntas->chunk(ceil($perguntas->count() / 2))->last() as $pergunta)
              <div class="checkbox mb-2">
                <label class="d-flex align-items-center">
                  <input type="checkbox" name="pergunta_ids[]" value="{{ $pergunta->id }}" class="mr-3" @if($tipoActividade->perguntas->contains('id', $pergunta->id)) checked @endif>
                  {{ $pergunta->descricao }}
                </label>
              </div>
            @endforeach
          </div>
        </div>

      <button type="submit" class="btn btn-primary ml-auto my-3">Salvar perguntas</button>
  </form>

</div>
            <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 40%">Máquina</th>
                          <th>Perguntas</th>
                          <th>N° Perguntas</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        <tr>
                          <td>{{ $tipoActividade->nome }}</td>
                            <td>
                            @foreach ($tipoActividade->perguntas as $pergunta)
                              <span class="badge bg-primary">
                                    {{ $pergunta->descricao }}<br>
                            </span>
                            @endforeach
                          </td> 
                          <td>{{$tipoActividade->perguntas->count()}}</td>          
                        </tr>
                      
                      </tbody>
                    </table>
                  </div>
            </div>

            <div class="card-footer text-right">
                <a  href="{{ url('/tipo_actividade_perguntaIndex') }}" type="button" class="btn btn-warning">Voltar</a>
            </div>
  @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop