@extends('adminlte::page')

@section('title', 'Departamento')

@section('content_header')
      @if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
    <h1>Departamentos</h1>
@stop

@section('content')
    

<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('depCreate') }}"  class="btn btn-primary">
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
                      <th>Sigla</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($departamentos as $departamento)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $departamento->nome}}</td>
                      <td>{{ $departamento->descricao}}</td>
                      <td>{{ $departamento->sigla}}</td>
                      <td> 
                            <!-- Large modal -->
                            <a  class="btn btn-primary btn-sm d-inline" href="{{url('visualizar_departamento',$departamento->id)}}"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-info btn-sm d-inline"  href="{{url('update_departamento',$departamento->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                           
                            <form id="form-excluir" action="{{ route('departamentos.delete', ['id' => $departamento->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o Departamento {{ $departamento->nome }}?')"><i class="fas fa-trash"> </i></button>
                            </form>
                      </td>
                     
                    
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                {{ $departamentos->links('pagination::bootstrap-4') }}
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