<?php

namespace App\Model\Eventos;

use Illuminate\Database\Eloquent\Model;
use App\Model\Departamento\Departamento;

class Video extends Model
{
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
