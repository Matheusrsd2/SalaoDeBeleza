@extends('layouts.app')

@section('content')

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<center>
<h5>Esse é o seu histórico de agendamentos para o período informado</h5>
    <table class="table table-bordered table-secundary">
        <thead>
            <tr>
                <th>Nome do Cliente</th>
                <th>Serviço Solicitado</th>
                <th>Data </th>
                <th>Hora</th>
                <th>Agendado em:</th>
                <th>Opções</th>
            </tr>
        </thead>
        @foreach($agend as $a) 
        <tbody>
            <tr>
                <td>{{$a->nome_cliente}} </td>
                <td>{{$a->servico}} </td>
                <td>{{$a->data}} </td>
                <td>{{$a->hora}} </td>
                <td>{{$a->created_at}} </td>
                <td>
                    <a href="alterar/{{$a->id}}">
                    <button class="btn btn-success">
                        <i class="small material-icons">edit</i>Alterar
                    </button>
                    </a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
<center>

</body>
<html>
@endsection