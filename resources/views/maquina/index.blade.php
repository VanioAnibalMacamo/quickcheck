@extends('adminlte::page')

@section('title', 'Máquinas')

@section('content_header')
@if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
<h1>Máquinas</h1>
      
@stop

@section('content')
<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('maquinaCreate') }}"  class="btn btn-primary">
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
                      <th>Nome</th>
                      <th>Número Máquina</th>
                      <th>Massa Máquina</th>
                      <th>Data Registo</th>
                      <th>departamento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($maquinas as $maquina)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $maquina->nome}}</td>
                      <td>{{ $maquina->numero}}</td>
                      <td>{{ $maquina->massa}} Tonelada(s)</td>
                      <td>{{ $maquina->dataRegisto}}</td>
                      @foreach($departamentos as $departamento)
                        @if($maquina->departamento_id == $departamento->id)
                        <td>{{ $departamento->sigla}}</td>
                        @endif
                      @endforeach
                      <td> 
                           
                            <a  class="btn btn-primary btn-sm d-inline" href="{{url('visualizar_maquina',$maquina->id)}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-info btn-sm d-inline"  href="{{url('update_maquina',$maquina->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                            <form id="form-excluir" action="{{ route('maquina.delete', ['id' => $maquina->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir a Máquina?{{ $maquina->nome }}?')"><i class="fas fa-trash"> </i></button>
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