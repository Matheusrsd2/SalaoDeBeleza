@extends('layouts.app')
@section('content')

<body>
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Alterar Agendamento</div>
                    <div class="card-body">
                        <form action="/agendamento/update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" name="id" value="{{$agend->id}}">
                            <div class="col-sm-6">
                                <label>Nome do Cliente</label>
                                <input type="text" name="nome_cliente" class="form-control" value="{{$agend->nome_cliente}}">
                            </div>
                            <div class="col-sm-4">
                                <label>Novo Serviço</label>
                                <input type="text" name="servico" class="form-control" value="{{$agend->servico}}">
                            </div>
                            <div class="col-sm-4">
                                <label>Nova Data</label>
                                <input type="date" name="data" class="form-control" value="{{$agend->data}}">
                            </div>
                            <div class="col-sm-3">
                                <label>Horário</label>
                                <input type="time" name="hora" class="form-control" value="{{$agend->hora}}">
                            </div><br>
                            <center><button class="btn btn-primary">Alterar</button><center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection