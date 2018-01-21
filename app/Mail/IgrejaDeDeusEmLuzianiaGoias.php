<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IgrejaDeDeusEmLuzianiaGoias extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contato;
    public $artigo;
    public function __construct($contato, $artigo)
    {
        $this->contato = $contato;
        $this->artigo = $artigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data= array(
            'artigos'   =>  $this->artigo,
            'contato'   =>  $this->contato,
        );
        return $this->view('frontend.email.contato.contato-mensagem' , $data);
    }
}
