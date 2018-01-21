<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
use App\Events\NotificacaoContato;

class NotificacaoContatoSend extends Notification
{
    use Queueable;

    public $contato;

    public function __construct($contato)
    {
        // return dd($contato);
        $this->contato = $contato;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


//    public function toDatabase($notifiable)
//    {
//        return [
//            'contato'   =>  $this->contato,
//        ];
//    }


    public function toArray($notifiable)
    {

        return [
            'data'      => 'Novo Contato de um usuário <br>  Nome: <b> '. $this->contato->nome . "</b><br>",
            'contato'   => $this->contato,
            'endereco'  => $this->contato->id,

        ];
    }

}
