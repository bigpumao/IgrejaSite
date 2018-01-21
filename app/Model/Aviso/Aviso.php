<?php

namespace App\Model\Aviso;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $fillable = ['titulo', 'horas', 'titulo', 'descricao' , 'status' , 'semana'];
}
