<?php

namespace App\Model\Slids;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['imagem' , 'titulo', 'expirar' , 'status', 'user_id'];
}
