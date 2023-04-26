@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Funcionário</h1>
@stop

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados do Funcionário</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
  
              <form action="{{url('update',$funcionario->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $funcionario->nome }}" placeholder="Digite o seu nome completo...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Contacto</label>
                        <input type="text" class="form-control" id="contacto" name='contacto' value="{{ $funcionario->contacto }}" placeholder="ex: 841234567">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="email" name='email' value="{{ $funcionario->email }}" placeholder=" ex: quick@check.co.mz">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Morada</label>
                        <input type="text" class="form-control" id="morada" name='morada' value="{{ $funcionario->morada }}" placeholder="Bairro, quarteirao, rua, etc...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputState">Gênero</label>
                        <select id="genero" class="form-control" name='genero'>
                        @foreach(['Seleccione...','Masculino', 'Feminino'] as $option)
                                <option value="{{ $option }}" @if($option === $funcionario->genero) selected @endif>{{ $option }}</option>
                         @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputEmail4">Bilhete de Identidade</label>
                        <input type="text" class="form-control" id="num_bi"  name='num_bi' value="{{ $funcionario->num_bi }}" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputEmail4">Tipo</label>
                        <select id="inputState" class="form-control" name='tipo_doc'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\parametrizacao\documento\Tipo::all() as $tipo)
                                <option value="{{ $tipo->id }}"@if($tipo->id === $funcionario->tipo_id) selected @endif>{{ $tipo->descricao}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\Departamento::all() as $departamento)
                                 <option value="{{ $departamento->id }}" @if($departamento->id === $funcionario->departamento_id) selected @endif> {{ $departamento->nome }}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                    </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Actualizar'>
                        <a  href="{{ url('/funcIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
                    </div>
              </form>
            </div>
            <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop