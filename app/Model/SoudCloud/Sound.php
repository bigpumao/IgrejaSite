<?php

namespace App\Model\SoudCloud;

use Illuminate\Database\Eloquent\Model;
use App\Model\Departamento\Departamento;

class Sound extends Model
{
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
