<?php

namespace App\Model\YouTube;
use App\Model\Departamento\Departamento;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
