@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
      @if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
    <h1>Funcionários</h1>
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
                      <th>Contacto</th>
                      <th>E-mail</th>
                      <th>Genero</th>
                      <th></th>
                      <th>N. Documento</th>
                      <th>Departamento</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($funcionarios as $funcionario)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $funcionario->nome}}</td>
                      <td>{{ $funcionario->contacto}}</td>
                      <td>{{ $funcionario->email}}</td>
                      <td>{{ $funcionario->genero}}<td>
                      <td>{{ $funcionario->num_bi}}</td>
                      <td>{{ $funcionario->departamento->sigla}}</td>
                      <td> 
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary btn-sm d-inline" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-eye"></i></button>
                            <a class="btn btn-info btn-sm d-inline" href="{{url('update_funcionario',$funcionario->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                            <form id="form-excluir" action="{{ route('funcionarios.delete', ['id' => $funcionario->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o Funcionario {{ $funcionario->nome }}?')"><i class="fas fa-trash"> </i></button>
                            </form>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                {{ $funcionarios->links('pagination::bootstrap-4') }}
              </div>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                 



                   <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visualizar Funcionário</h3>
              </div>
                      <!-- /.card-header -->
                      <!-- form start -->
          
                      <form action="{{url('update',$funcionario->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputAddress">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name='nome' value="{{ $funcionario->nome }}" placeholder="Digite o seu nome completo..." readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Contacto</label>
                                <input type="text" class="form-control" id="contacto" name='contacto' value="{{ $funcionario->contacto }}" placeholder="ex: 841234567" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" name='email' value="{{ $funcionario->email }}" placeholder=" ex: quick@check.co.mz" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Morada</label>
                                <input type="text" class="form-control" id="morada" name='morada' value="{{ $funcionario->morada }}" placeholder="Bairro, quarteirao, rua, etc..." readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputState">Gênero</label>
                                <select id="genero" class="form-control" name='genero' disabled style="pointer-events: none;">
                                @foreach(['Seleccione...','Masculino', 'Feminino'] as $option)
                                        <option value="{{ $option }}" @if($option === $funcionario->genero) selected @endif>{{ $option }}</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Bilhete de Identidade</label>
                                <input type="text" class="form-control" id="num_bi"  name='num_bi' value="{{ $funcionario->num_bi }}"  placeholder="" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Tipo</label>
                                <select id="inputState" class="form-control" name='tipo_doc' disabled style="pointer-events: none;">
                                    <option selected>Seleccione...</option>
                                    @foreach(App\Models\parametrizacao\documento\Tipo::all() as $tipo)
                                    <option value="{{ $tipo->id }}"@if($tipo->id === $funcionario->tipo_id) selected @endif>{{ $tipo->descricao}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-10">
                                  <label for="inputState">Departamento</label>
                                  <select id="inputState" class="form-control" name='departamento' disabled style="pointer-events: none;">
                                      <option selected>Seleccione...</option>
                                      @foreach(App\Models\Departamento::all() as $departamento)
                                          <option value="{{ $departamento->id }}" @if($departamento->id === $funcionario->departamento_id) selected @endif> {{ $departamento->nome }}</option>
                                      @endforeach
                                  </select>
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