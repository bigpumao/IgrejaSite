<?php
/**
 * Created by PhpStorm.
 * User: natanmelo
 * Date: 03/10/17
 * Time: 22:12
 */

namespace App\Observers;

use App\Notifications\NotificarNovoUsuario;
use App\Notifications\NotificaUsuarioExcluido;
use App\User;

class ObservarUser
{
    public function created(User $user)
    {
        $user->notify(new NotificarNovoUsuario());
    }
    public function deleting(User $user)
    {
        $user->notify(new NotificaUsuarioExcluido());
    }
}