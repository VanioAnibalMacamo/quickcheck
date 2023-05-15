@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Cadastrar Actividade</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Aréa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('saveActividade')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="nome" name='nome' placeholder="Digite o nome...">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name='descricao' placeholder="Digite a descrição...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputState">Tipo de Actividade</label>
                        <select id="inputState" class="form-control" name='tipoActividade'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\TipoActividade::all() as $tipoActividade)
                                 <option value="{{ $tipoActividade->id }}">{{ $tipoActividade->nome }}</option>
                             @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Área</label>
                        <select id="inputState" class="form-control" name='area'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\Area::all() as $area)
                                 <option value="{{ $area->id }}">{{ $area->nome }}</option>
                             @endforeach
                        </select>
                        </div>
                    </div>
                   
                   
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value='Salvar'>
                        <a  href="{{ url('/actividadeIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
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