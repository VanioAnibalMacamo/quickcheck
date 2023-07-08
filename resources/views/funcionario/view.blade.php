@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Visualizar Funcionario</h1>
      
@stop

@section('content')
        <!-- general form elements -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nome </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('visualizarfuncionario',$funcionario->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name='nome' value="{{ $funcionario->nome }}" placeholder="Digite o nome do funcionario..." readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Contacto</label>
                        <input type="text" class="form-control" id="contacto" name='contacto' value="{{ $funcionario->contacto }}" placeholder="Digite o nome do funcionario..."  readonly>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" id="email" name='email' value="{{ $funcionario->email }}" placeholder="Digite o email..."  readonly>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Genero</label>
                        <input type="text" class="form-control" id="genero" name='genero' value="{{ $funcionario->genero }}" placeholder="Digite o genero..."  readonly>
                        </div> 
                </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="inputAddress">N. Documento</label>
                        <input type="text" class="form-control" id="num_bi" name='num_bi' value="{{ $funcionario->num_bi }}" placeholder="Digite o nome do funcionario..." readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control" name='departamento' readonly>
                            <option selected>Seleccione...</option>

                        </div> 
                    </div>
                            
                          
                        </select>
                        <div class="card-footer">
                        <a  href="{{ url('funcIndex') }}" type="button" class="btn btn-warning">Voltar</a>
                    </div>
                        </div>
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
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event, nome) {
        event.preventDefault(); // Prevenir envio do formulário padrão
        
        Swal.fire({
            title: 'Tem certeza que deseja excluir o Checklist '+nome+'?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-excluir').submit(); // Enviar formulário após confirmação
            }
        });
    }
</script>
@stop


