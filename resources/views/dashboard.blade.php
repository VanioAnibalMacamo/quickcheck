@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $numChecklists }}</h3>
                    <p>Checklists</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/checkListIndex" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $numMaquinas }}</h3>
                    <p>Máquinas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/maquinaIndex" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $numAtividades }}</h3>
                    <p>Actividades</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/actividadeIndex" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $numFuncionarios }}</h3>
                    <p>Funcionários</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/funcIndex" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
