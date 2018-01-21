<?php

namespace App\Http\Controllers\dashboard\UserContato;


use App\Model\Contato\Usercontato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class UserContatoController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(request(),[
            'endereco'  =>  'required',
            'telefone'  =>  'required',
        ]);
        $contato = new Usercontato();
        $contato->user_id = auth()->user()->id;
        $contato->telefone = $request->telefone;
        $contato->endereco = $request->endereco;
        $result = $contato->save();
        if($result)
        {
            return redirect()->back()->with('msg','Contato salvo com sucesso');
        }else{
            return redirect()->back()->with('error','Não foi possível salvar o seu contato');
        }
    }
}
