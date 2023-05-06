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
                            <button type="button" class="btn btn-primary btn-sm d-inline" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm d-inline"  href="{{url('update_departamento',$departamento->id)}}"> <i class="fas fa-pencil-alt"></i></a>
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


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                   <div class="modal-content">


                     <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados do Departamento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('saveDep')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                        <label for="inputAddress">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $departamento->nome }}" placeholder="Digite o nome do Departamento..."readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name='sigla' value="{{ $departamento->sigla }}" placeholder="ex: GRH"readonly>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Descricao</label>
                        <input type="text" class="form-control" id="descricao" name='descricao' value="{{ $departamento->descricao }}"placeholder="ex: Estamos todos juntos"readonly>
                        </div>
                    </div>
                  
              </form>
            </div>
            <!-- /.card -->






                    </div>
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