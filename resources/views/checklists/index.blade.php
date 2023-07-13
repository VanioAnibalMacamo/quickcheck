@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
      @if (session('mensagem'))
          <div class="alert alert-success">{{ session('mensagem') }}</div>
      @endif
      @if (session('successDelete'))
          <div class="alert alert-danger">{{ session('successDelete') }}</div>
      @endif
    <h1>CheckLists</h1>
@stop

@section('content')
<div class="d-flex flex-row-reverse align-items-end mb-3">
  <a href="{{ url('preenchimento') }}"  class="btn btn-primary">
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
                <th>Funcionario</th>
                <th>Actividade</th>
                <th>Máquina</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checklists as $checklist)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $checklist->nome }}</td>
                    <td>{{ $checklist->funcionario->nome }}</td>
                    <td>{{ $checklist->actividade->nome }}</td>
                    <td>{{ $checklist->maquina->nome }}</td>
                    <td>
                        @if($checklist->status === 'Concluido')
                            <span class="badge bg-warning text-dark">
                                {{ $checklist->status }}
                            </span>
                        @elseif ($checklist->status === 'Pendente')
                        <span class="badge bg-danger">
                            {{ $checklist->status }}
                        </span>
                        @endif
                    </td>
                    <td>{{ $checklist->data }}</td>
                    <td>
                         <!-- Large modal -->
                        <a  class="btn btn-primary btn-sm d-inline" href="{{url('visualizar_checklist',$checklist->id)}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-info btn-sm d-inline"  href="{{url('update_preenchimento_checklist',$checklist->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                        <form id="form-excluir" action="{{ route('checklists.delete', ['id' => $checklist->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ $checklist->nome }}')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $checklists->links('pagination::bootstrap-4') }}
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
