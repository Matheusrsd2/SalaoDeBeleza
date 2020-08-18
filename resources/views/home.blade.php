@extends('layouts.app')

@section('content')
<body>
    <div class="container">
    <center>
        <button class="btn btn-warning">Cadastrar um novo Serviço</button>
        <button class="btn btn-warning">Filtrar Agendamentos por Data</button>
    </center>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Agendamentos') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover">
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

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
