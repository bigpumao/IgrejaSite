<?php

namespace App;

use App\Model\Album\Departamento;
use App\Model\Biografia\Biografia;
use App\Model\Contato\Usercontato;
use App\Model\Postagem;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }

    public function postagens()
    {
        return $this->hasMany(Postagem::class);

    }

    public function biografia()
    {
        return $this->hasOne(Biografia::class);
    }

    public function contatos()
    {
        return $this->hasMany(Usercontato::class);
    }


}
