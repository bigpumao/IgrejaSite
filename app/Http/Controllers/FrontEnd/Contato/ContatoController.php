<?php

namespace App\Http\Controllers\FrontEnd\Contato;

use App\Events\NotificacaoContato;
use App\Http\Controllers\Controller;
use App\Mail\IgrejaDeDeusEmLuzianiaGoias;
use App\Model\Contato\Contato;
use App\Model\Postagem;
use App\Notifications\ContatoEmail;
use App\Notifications\NotificacaoContatoSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\user;

class ContatoController extends Controller
{
    private $paginate = 2;

    public function index()
    {
        $data = array(
            'titulo' => 'Formulário para Contato',
            'artigos' => Postagem::with('departamentos')->where('status', true)->orderByDesc('visualizacao')->paginate($this->paginate),
        );

        return view('frontend.contato.index', $data);
    }

    public function store(Request $request)
    {


        $artigo = Postagem::with('departamentos')->where('status', true)->orderByDesc('visualizacao')->paginate($this->paginate);
        $this->validate(request(), [
            'nome' => 'required',
            'email' => 'required|string|email|max:255|',
            'telefone' => 'required',
            'mensagem' => 'required',
        ]);
        $result = Contato::create($request->all());
        if ($result) {

            $contato = $result->find($result->id);

            $user = User::all();
            \Notification::send($user, new NotificacaoContatoSend($contato));

//            Envia email para o contato (Formulário de contato Front End) send(Mnada para ume view, um array com os dados que vão para a view , function($objeto message))
//            Com o objeto em mão esite a função to(que eu recupero o Endereço de email com o $_REQUEST)
//            e com o subject eu manda o titulo do email.
//            Mail::send('frontend.email.contato.contato-mensagem' , ['artigos' =>  $artigo , 'contato'   =>  $request] , function($message){
//                $message->to($_REQUEST['email']);
//                $message->subject('Contato Igreja de Deus em Luziania');
//            });

            return redirect()->back()->with('msg', 'Contato Enviado com sucesso. Enviamos um E-Mail para o endereço: ' . $request->email . ' Verifique sua caixa de SPAM');
        } else {
            return redirect()->back()->with('error', 'Não foi possivel salvar o seu contato. Tente novamente mais tarde, ou entre em contanto com o admin do sistema no roda pé do site.');
        }
    }

}
