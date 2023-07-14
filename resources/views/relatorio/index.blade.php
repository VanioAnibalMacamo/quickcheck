@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
      @if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
    <h1>Relatorios</h1>
@stop

@section('content')

<div class="card">
          <!-- /.card-header -->
<div class="card-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nome CheckList</th>
                <th>Pergunta</th>
                <th>Resposta Optima</th>
                <th>Funcionario</th>
                <th>Actividade</th>
                <th>Máquina</th>
                <th>Comentario</th>
                <th>Resposta</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dadosChecklists as $index => $dados)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dados->nome_checklist }}</td>
                    <td>{{ $dados->pergunta_descricao }}</td>
                    <td>{{ ucfirst($dados->resposta_optima) }}</td>
                    <td>{{ $dados->nome_funcionario }}</td>
                    <td>{{ $dados->nome_actividade }}</td>
                    <td>{{ $dados->nome_maquina }}</td>
                    <td>{{ $dados->comentario }}</td>
                    <td>{{ $dados->resposta }}</td>
                    <td>{{ $dados->data }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dadosChecklists->links('pagination::bootstrap-4') }}
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
