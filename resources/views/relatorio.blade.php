<body>
    <center><h5>Total: {{$count}} Agendamentos</h5></center>
    <center><h7>Ordenado pelos Mais Recentes</h7></center>
    <table class="table table-bordered table-dark bg-light">
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
</body>
