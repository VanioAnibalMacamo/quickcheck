@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Editar  Área</h1>

@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Aréa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ url('/updateActividade/' . $actividade->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $actividade->nome }}" placeholder="Digite o nome...">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $actividade->descricao }}" placeholder="Digite a descrição...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipoActividade">Tipo de Atividade</label>
                            <select id="tipoActividade" class="form-control" name="tipoActividade">
                                @foreach(App\Models\TipoActividade::all() as $tipoAtividade)
                                    <option value="{{ $tipoAtividade->id }}" @if($actividade->tipoActividade->id == $tipoAtividade->id) selected @endif>{{ $tipoAtividade->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area">Área</label>
                            <select id="area" class="form-control" name="area">
                                @foreach(App\Models\Area::all() as $area)
                                    <option value="{{ $area->id }}" @if($actividade->area->id == $area->id) selected @endif>{{ $area->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                    <a href="{{ url('/actividadeIndex') }}" type="button" class="btn btn-warning">Cancelar</a>
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
