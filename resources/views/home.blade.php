@extends('layouts.app')
@section('content')

@if(Session::has('message'))
<center>
<div class="alert alert-info" style="height:70px; width:500px">
    <i class="large material-icons">check_box</i>{{ Session::get('message') }}
</div>
</center>
@endif
@if(Session::has('update'))
<center>
<div class="alert alert-info" style="height:70px; width:500px">
    <i class="large material-icons">check_box</i>{{ Session::get('update') }}
</div>
</center>
@endif
@if(Session::has('unauthorized'))
<center>
<div class="alert alert-danger" style="height:70px; width:500px">
    <i class="large material-icons">close</i>{{ Session::get('unauthorized') }}
</div>
</center>
@endif

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salão de Beleza</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Scripts -->
    </head>
    <body>  
    <center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#admin">Acesso Administrativo (Dono)</button></center><br>
    <center>
        <!-- Button trigger modal -->
        <p>Para Ver o Seu Histórico</p>
        <p>ou Alterar um Agendamento</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verificar">
            Clique Aqui
        </button>
    </center>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><center>Novo Agendamento<i class="large material-icons">book</i></center></div>
                    <div class="card-body">
                        <form action="/agendamento/novo" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <div class="col-sm-6">
                                <label>Nome do Cliente</label>
                                <input type="text" name="nome_cliente" class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Serviço a ser solicitado</label>
                                <input type="text" name="servico" class="form-control" required>
                            </div><br><br>
                            <div class="col-sm-4">
                                <label>Informe o dia que deseja</label>
                                <input type="date" name="data" class="form-control" required>
                            </div><br>
                            <div class="col-sm-3">
                                <label>Informe o horário</label>
                                <input type="time" name="hora" class="form-control" required>
                            </div><br><br><br><br><br>
                            <center><button class="btn btn-primary">Agendar</button><center>
                        </form>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
    <!-- modal Analisar Histórico-->
    <div class="modal fade" id="verificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form action="/agendamento/historico" method="get">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Informe o período que deseja analisar</h4>
                        </div>
                        <center>
                        <div class="modal-body">
                            <label>Do Dia:</label>
                            <input type="date" name="data_inicio" required>
                        </div>
                        <div class="modal-body">
                            <label>Até o Dia:</label>
                            <input type="date" name="data_final" required>
                        </div>
                        <center>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- MODAL PARA ACESSO ADM !-->
        <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form action="/permissao" method="get">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Entre com sua Permissão de Administrador</h4>
                        </div>
                        <center>
                        <div class="modal-body">
                            <label>Nome</label>
                            <input type="text" name="nome" required>
                        </div>
                        <div class="modal-body">
                            <label>Chave de Acesso</label>
                            <input type="text" name="chave_acesso" required>
                        </div>
                        <center>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
@endsection
