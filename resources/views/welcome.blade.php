@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Salão de Beleza</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
    <center>
    <div id="card" class="card col-sm-9 p-4 mb-4 bg-light text-dark">
        <div class="card-body">
            <form action="/agendamento/novo" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="col-sm-6">
                    <label>Nome do Cliente</label>
                    <input type="text" name="nome_cliente" class="form-control" required>
                </div><br>
                <div class="col-sm-4">
                    <label>Informe o dia que deseja</label>
                    <input type="date" name="data" class="form-control" required>
                </div><br>
                <div class="col-sm-3">
                    <label>Informe o horário</label>
                    <input type="time" name="hora" class="form-control" required>
                </div><br>
                <button class="btn btn-primary">Agendar</button>
            </form>
        </div>
    </div>
    </center>
    </body>
</html>
@endsection

