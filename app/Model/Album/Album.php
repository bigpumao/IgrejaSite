<?php

namespace App\Model\Album;

use Illuminate\Database\Eloquent\Model;
use App\Model\Departamento\Departamento;
use App\Model\Album\ImagemAlbum;
class Album extends Model {

    protected $fillable = ['nome', 'descricao', 'departamento_id', 'imagem_capa'];

    public function getAlbum() {
        $result = Album::all();
        return $result;
    }

    public function departamentos() 
    {
        return $this->belongsToMany(Departamento::class);
    }
    public function imagens(){
        return $this->hasMany(ImagemAlbum::class);
    }
    

}
