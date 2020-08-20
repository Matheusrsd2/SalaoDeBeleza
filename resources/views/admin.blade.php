@extends('layouts.app')

@section('content')

<center><a href="/gerarpdf">
            <button type="button" class="btn btn-info">Clique aqui para gerar Relatório de Agendamentos</button></center>
        </a>
<center><h5>Total: {{$count}} Agendamentos</h5></center>
<center><h7>Ordenado pelos Mais Recentes</h7></center>
<table class="table table-bordered table-dark bg-primary">
    <thead>
        <tr>
            <th>Status</th>
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
            <td>{{$a->status}} </td>
            <td>{{$a->nome_cliente}} </td>
            <td>{{$a->servico}} </td>
            <td>{{$a->data}} </td>
            <td>{{$a->hora}} </td>
            <td>{{$a->created_at}} </td>
            <td>
                <a href="javascript: if(confirm('Tem certeza que deseja CONCLUIR ESSE ATENDIMENTO?')) 
                            location.href='agendamento/concluir/{{$a->id}}'">
                    <button class="btn btn-success">
                        <i class="medium material-icons">check</i>
                    </button>
                </a>
                <a href="javascript: if(confirm('Tem certeza que deseja CANCELAR?')) 
                            location.href='agendamento/cancelar/{{$a->id}}'">
                    <button class="btn btn-danger">
                        <i class="medium material-icons">close</i>
                    </button>
                </a>
                <a href="agendamento/alterar/{{$a->id}}">
                    <button class="btn btn-info">
                        <i class="medium material-icons">edit</i>
                    </button>
                </a>
                </td>
            </tr>
    </tbody>
    @endforeach
</table>

@endsection