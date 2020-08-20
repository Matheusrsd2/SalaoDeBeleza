@extends('layouts.app')

@section('content')

<center><h5>Total: {{$count}} Agendamentos</h5></center>
<table class="table table-bordered table-dark bg-info">
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
                <form action="agendamento/concluir" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="id" value="{{$a->id}}"/>
                    <button class="btn btn-success">
                        <i class="small material-icons">check</i>
                    </button>
                </form>
                <form action="agendamento/cancelar" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="id" value="{{$a->id}}"/>
                    <button class="btn btn-danger">
                        <i class="small material-icons">close</i>
                    </button>
                </form>
                <a href="agendamento/alterar/{{$a->id}}">
                    <i class="large material-icons">edit</i>
                </a>
                </td>
            </tr>
    </tbody>
    @endforeach
</table>

@endsection