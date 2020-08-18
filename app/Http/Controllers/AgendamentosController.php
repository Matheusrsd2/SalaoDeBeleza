<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    //Função para criar um agendamento para o cliente
    public function store (Request $request) {
        try {
            //Obtém os dados do formulario
            $data = $request->all();
            $a = new Agendamento();
            $a->create($data); //salva os dados no banco
            return redirect('/')->with('message', 'Agendamento efetuado com sucesso!');;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

}
