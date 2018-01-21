<?php

namespace App\Model\Departamento;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Postagem;
use App\Model\YouTube\Youtube;
use App\Model\Album\Album;
use App\Model\Album\ImagemAlbum;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Video;

class Departamento extends Model {

    protected $fillable = ['departamento'];

    
    public function user()
    
    {
        return $this->belongsto(User::class);
    }
    public function postagems()
    {
        return $this->belongsToMany(Postagem::class);
    }
    public function youtubes()
    {
        return $this->belongsToMany(Youtube::class);
    }
    public function albuns()
    {
        return $this->belongsToMany(Album::class);
    }
    public function eventos()
    {
        return $this->belongsToMany(Evento::class);
    }
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
    public function imagemAlbums()
    {
        return $this->hasManyThrough(ImagemAlbum::class, Album::class);
    }




    


    public function foreachDelImg($id) {
        $c = DB::table('images')
                ->join('albums', 'albums.id', '=', 'images.album_id')
                ->where('albums.id', $id)
                ->select('images.imagem')
                ->get();
        return $c;
    }

    public function updateDeparta($id) {
        $d = DB::table('departamentos')
                        ->join('albums', 'albums.departamento_id', '=', 'departamentos.id')
                        ->where('albums.id', $id)
                        ->get()->first();

        return $d;
    }

}
