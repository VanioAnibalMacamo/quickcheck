@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Máquina</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Máquina</h3>
              </div>
        
              <form action="{{url('updateMaquina',$maquina->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $maquina->nome }}" placeholder="Digite o nome da Máquina...">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Número Máquina</label>
                        <input type="text" class="form-control" id="descricao" name='numero' value="{{ $maquina->numero }}" placeholder="Digite o número da Máquina">
                        </div>
                        <div class="form-group col-md-6">
                        
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento'>
                            <option selected>Seleccione...</option>
                            @foreach(App\Models\Departamento::all() as $departamento)
                                 <option value="{{ $departamento->id }}" @if($departamento->id === $maquina->departamento_id) selected @endif> {{ $departamento->nome }}</option>
                             @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Massa da Máquina (Toneladas) </label>
                        <input type="text" class="form-control" id="massa" name="massa" value="{{ $maquina->massa}}" placeholder="Digite a massa da Máquina" required>

                        </div>
                        <div class="form-group col-md-6">
                                                  <!-- Date and time -->
                        <div class="form-group">
                            <label>Data de Registo:</label><br/>
                            <input type="datetime-local" name="dataRegistro" value="{{ \Carbon\Carbon::parse($maquina->dataRegisto)->format('Y-m-d\TH:i:s') }}">
                        </div>       
                        </div>
                    </div>
                
                   
                   
                    <div class="card-footer">
                        
                        <input type="submit" class="btn btn-primary" value='Actualizar'>
                        <a  href="{{ url('/maquinaIndex') }}" type="button" class="btn btn-warning">Voltar</a>
                    </div>
              </form>
            </div>
            <!-- /.card -->

@stop

@section('css')
    
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    // Obter a data e hora atual
    var now = new Date();

    // Formatar a data e hora no formato suportado pelo elemento "datetime-local"
    var dateString = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
    var timeString = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
    var dateTimeString = dateString + 'T' + timeString;

    // Definir o valor máximo do elemento "datetime-local"
    document.getElementsByName("dataRegistro")[0].setAttribute('max', dateTimeString);

   
    </script>

    
<script>
    document.getElementById('massa').addEventListener('input', function(e) {
        var inputValue = e.target.value;
        var numericValue = inputValue.replace(/[^0-9.]/g, ''); // Remove todos os caracteres que não são números ou vírgula
        e.target.value = numericValue;
    });
</script>

    
@stop