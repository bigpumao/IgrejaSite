<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontEnd\PedidoOracao;

class PedidoOracaoController extends Controller {

    public function store(Request $request) {
      
        $this->validate(request(), [
            'secret' => 'required',
            'area' => 'required',
            'nome' => 'required',
            'email' => 'required|email',
            'titulo' => 'required',
            'descricao' => 'required',
        ]);
        
        $result = PedidoOracao::create($request->all());
        if ($result) {
            return redirect()->back()->with('success', 'Pedido de Oração envidado');
        } else {
            return redirect()->back()->with('error', 'Infelizmente tivemos algum problema. Atualize a página e tente outra vez');
        }
    }

}
