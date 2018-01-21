<?php

namespace App\Model\Contato;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Contato extends Model
{
    use Notifiable;
    protected $fillable = ['nome' , 'email', 'telefone' , 'mensagem' ];
}
