<?php

namespace App\Model\Contato;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Usercontato extends Model
{
   protected $fillable = ['telefone', 'endereco'];

   public function user()
   {
       return $this->belongsto(User::class);
   }
}
