<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Model\Departamento\Departamento;
use App\User;
class Postagem extends Model
{
    protected $fillable = [
        'titulo',
        'imagem',
        'descricao',
        'status',
        ];
    
    public function departamentos(){
        return $this->belongsToMany(Departamento::class);
    }
   
   public function user(){
       return $this->belongsTo(User::class);
   }
}
