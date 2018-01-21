<?php

namespace App\Http\Controllers\FrontEnd\Galeria;

use App\Model\Album\Album;
use App\Model\Album\ImagemAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleriaImagensController extends Controller
{
    private $imagem = 16;
    private $album = 10;
    public function index()
    {
        $data = array(
            'titulo'    =>  'Galeria de Imagens',
            'albuns'   =>  Album::with('imagens')->where('status', true)->paginate($this->album),
        );
        return view('frontend.galeria.index', $data);
    }
    public function get($id)
    {
        $data = array(
            'titulo'    =>  'Imagens do Álbum',
            'imagens' => ImagemAlbum::with('album')->where('album_id', $id)->paginate($this->imagem),
        );
        return view('frontend.galeria.imagens' ,$data);
    }
}
