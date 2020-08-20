<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Permissao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;

class AgendamentosController extends Controller
{
    //Função para criar um agendamento para o cliente
    public function store (Request $request) {
        try {
            //Obtém os dados do formulario
            $a = new Agendamento();
            $a->nome_cliente = $request->input('nome_cliente');
            $a->servico = $request->input('servico');
            $a->data = $request->input('data');
            $a->hora = $request->input('hora');
            $a->cliente_id = Auth::user()->id;
            
            $a->save(); //salva os dados no banco
            return redirect('/home')->with('message', 'Agendamento efetuado com sucesso!');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    //buscar historico de agendamentos do cliente, filtrando pela data
    public function historico (Request $request) {
        $data_inicio = $request->input('data_inicio');
        $data_final = $request->input('data_final');

        //busca pelo id do usuario logado e pega o intervalo da data com between
        $agend = Agendamento::where('cliente_id', Auth::user()->id)
        ->whereBetween('data', [$data_inicio, $data_final])->get();

        //se existir algum registro, envia os dados para view
        if ($agend) {
            return view('historico', compact('agend'));
        }
    }

    //editar registro selecionado
    public function edit($id)
    {
        $agend = Agendamento::find($id);
        return view('edit-agendamento', ['agend' => $agend]);
    }

    //atualizar dados do agendamento
    public function update (Request $request) {
        $data = $request->all();
        $agend = Agendamento::find($data['id']);
        $agend->fill($data);
        $agend->update();
        return redirect('/home')->with('update', 'Agendamento alterado com sucesso!');
    }

    //Autenticação do Adm e listagem de agendamentos
    public function authorizeAdmin (Request $request) {
        try {
            $nome = $request->input('nome');
            $chave = $request->input('chave_acesso'); 

            //verifica se os requests possuem o mesmo valor no banco para autorizar acesso
            $checknome = DB::select("select nome from permissao where nome = '$nome'");
            $checkchave = DB::select("select chave_acesso from permissao where chave_acesso ='$chave'");

            //se diferente de null, acesso adm autorizado
            if($checknome && $checkchave != null)
            {
                return $this->index();
            }
            //senao, acesso nao autorizado, retorna para a home com a mensagem de erro
            else {
                return redirect('/home')->with('unauthorized','Acesso Negado. Tente Novamente');
            }  
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    //Dashboard Gerencial para o admin
    public function index() {

        //Pegando todos os registros de agendamento do banco e contando a quantidade
        $agend = DB::select("SELECT * from agendamentos order by created_at desc");
        $count = count($agend);
       
        //Contando a quantidade de agendamentos na ultima semana
        $totalSemanal = DB::select("SELECT * FROM agendamentos WHERE data BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE()");
        $count2 = count($totalSemanal);

        //verificando quais os serviços mais procurados na ultima semana e agrupando-os
        $servicosSemanal = DB::select("SELECT count(servico) as total, servico 
            FROM agendamentos WHERE data BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE()
            GROUP BY servico ORDER BY total DESC");
 
        return view('admin', compact('agend', 'count', 'count2', 'servicosSemanal'));
    }

    //Conclui Agendamento
    public function concluir (){
        $id = \Request::route('id');
        $a = new Agendamento();
        $status = $a->where('id', '=', $id)
        ->update(['status' => 'concluido']);

        return redirect()->back();
    }

    //Cancela Agendamento
    public function cancelar (Request $request){
        $id = \Request::route('id');
        $a = new Agendamento();
        $status = $a->where('id', '=', $id)
        ->update(['status' => 'cancelado']);
        return redirect()->back();
    }

    //Gera relatório pdf com os dados de agendamento
    public function gerarPdf() {
        $agend = DB::select("select * from agendamentos order by created_at desc");
        $count = count($agend);
        $pdf = PDF::loadView('relatorio', compact('agend', 'count'));
        
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }

}
