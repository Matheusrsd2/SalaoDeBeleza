@extends('layouts.app')

@section('content')

<head>
    <style>
    body{
        color:#1f104f;
    }
    div#table-servicos{
        position: absolute;
        top:75px;
        left:12px;
    }
    </style>

<body>
    <center>
        <br><br><br><p>Para Gerar um Relatório sobre os Agendamentos:
        <a href="/gerarpdf">
            <button type="button" class="btn btn-info">
                <i class="large material-icons">format_align_left</i>Clique Aqui  
            </button></center>
        </a></p>
    <center>
        <h5><b>Total Acumulado: {{$count}} Agendamentos</b></h5>
        <p>Total de agendamentos marcados na Ultima Semana: {{$count2}}</p>
    </center>
    <center><h7>Ordenado pelos Mais Recentes</h7></center>

    <div id="table-servicos">
        <h7>Serviços mais Solicitados na Última Semana</h7>
        <center><table class="table-bordered">
            <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Frequência</th>
                </tr>
            </thead>
            @foreach ($servicosSemanal as $s)
            <tbody>
                <tr>
                    <td>{{$s->servico}} </td>
                    <td>{{$s->total}} </td>
                </tr>
                @endforeach
            </tbody>
        </table></center>
    </div>
                
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
</body>
@endsection