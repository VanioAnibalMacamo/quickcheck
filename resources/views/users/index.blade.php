@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Utilizadores</h1>
      
@stop

@section('content')
        <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                      <td class="project-actions text-right"> 
                            <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-info btn-sm" href="#"> <i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"> </i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop