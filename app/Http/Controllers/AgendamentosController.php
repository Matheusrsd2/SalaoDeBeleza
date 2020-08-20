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
            $checknome = DB::select("select nome from permissao where nome = '$nome'");
            $checkchave = DB::select("select chave_acesso from permissao where chave_acesso ='$chave'");

            if($checknome && $checkchave != null)
            {
                return $this->index();
            }
            else {
                return redirect('/home')->with('unauthorized','Acesso Negado. Tente Novamente');
            }  
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    //listar todos os agendamentos para o admin
    public function index() {
        $agend = DB::select("select * from agendamentos order by created_at desc");
        $count = count($agend);
        return view('admin', compact('agend', 'count'));
    }

    //Cancela Agendamento
    public function concluir (){
        $id = \Request::route('id');
        $a = new Agendamento();
        $status = $a->where('id', '=', $id)
        ->update(['status' => 'concluido']);

        return redirect()->back();
    }

    public function cancelar (Request $request){
        $id = \Request::route('id');
        $a = new Agendamento();
        $status = $a->where('id', '=', $id)
        ->update(['status' => 'cancelado']);
        return redirect()->back();
    }

    public function gerarPdf() {
        $agend = DB::select("select * from agendamentos order by created_at desc");
        $count = count($agend);
        $pdf = PDF::loadView('relatorio', compact('agend', 'count'));
        
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }

}
