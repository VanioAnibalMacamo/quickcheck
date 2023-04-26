@extends('adminlte::page')

@section('title', 'Departamento')

@section('content_header')
    <h1>Departamentos</h1>
@stop

@section('content')
    

<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('funcCreate') }}"  class="btn btn-primary">
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
                            <button type="button" class="btn btn-primary btn-sm d-inline" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm d-inline"> <i class="fas fa-pencil-alt"></i></a>
                            <form id="form-excluir"  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"> </i></button>
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
@stop