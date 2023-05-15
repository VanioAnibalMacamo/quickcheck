@extends('adminlte::page')

@section('title', 'Tipo Actividade')

@section('content_header')
@if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
    <h1>Tipo de Actividades</h1>
@stop

@section('content')
    

<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('tipoActividadeCreate') }}"  class="btn btn-primary">
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
                      <th>Descrição</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tipoActividades as $tipoActividade)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $tipoActividade->nome}}</td>
                      <td>{{ $tipoActividade->descricao}}</td>
                      <td> 
                            <!-- Large modal -->
                            <a  class="btn btn-primary btn-sm d-inline" href="{{url('visualizar_tipoActividade',$tipoActividade->id)}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-info btn-sm d-inline"  href="{{url('update_tipoActividade',$tipoActividade->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                            <form id="form-excluir" action="{{ route('tipoActividades.delete', ['id' => $tipoActividade->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o Tipo de Actividade  {{ $tipoActividade->nome }}?')"><i class="fas fa-trash"> </i></button>
                            </form>
                      </td>
                     
                    
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                {{ $tipoActividades->links('pagination::bootstrap-4') }}
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