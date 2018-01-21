<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Aviso\Aviso;
use App\Model\Departamento\Departamento;
use App\Model\Eventos\Evento;
use App\Model\Eventos\Video;
use App\Model\Membro;
use App\Model\Postagem;
use App\Model\Slids\Slide;
use App\Model\SoudCloud\Sound;
use App\Model\YouTube\Youtube;

class FrontEndController extends Controller
{

    private $utimosArtigos = 3;
    private $evento = 3;
    private $artigos = 6;
    private $album = 3;
    private $soudcloud = 4;
    private $youtube = 2;


    public function index()
    {

        $expirar = Evento::where('data_fim', '<', date('Y-m-d'))->where('status', true)->where('expirar', true)->first();
        //dd($expirar);
        if (isset($expirar) and $expirar->count() >= 1) {
            $expirar->expirar = false;
            $expirar->status  = false;
            $expirar->save();
        }

        $data = array(
            'titulo'            => 'Igreja de Deus no Brasil em Luziânia Goias',
            'ultimoArtigos'     => Postagem::with('departamentos')->where('status', true)->orderBy('visualizacao', 'desc')->paginate($this->utimosArtigos),
            'eventos'           => Evento::with('departamentos')->where('status', true)->orderBy('id', 'desc')->paginate($this->evento),
            'slids'             => Slide::where('status', true)->orderBy('id', 'desc')->get(),
            'eventos'           => Evento::with('departamentos')->where('status', true)->where('expirar' , true)->where('checkbox', true)->orderBy('id', 'desc')->get(),
            'artigos'           => Postagem::with('departamentos')->where('status', true)->orderBy('id', 'desc')->paginate($this->artigos),
            'albuns'            => Album::where('status', true)->with('imagens')->orderBy('id', 'desc')->paginate($this->album),
            'soundcloud'        => Sound::with('departamentos')->where('status', true)->orderBy('id', 'desc')->paginate($this->soudcloud),
            'video'             => Video::with('departamentos')->where('status', true)->orderBy('id', 'desc')->first(),
            'aniversario'       => Membro::whereDay('dataNasc', date('d'))->whereMonth('dataNasc', date('m'))->get(['nome', 'imagem']),
            'youtube'           => Youtube::with('departamentos')->where('status', true)->orderBy('id', 'desc')->paginate($this->youtube),
            'avisos'            => Aviso::where('status', true)->get(),
            'departamento'      =>  Departamento::pluck('departamento', 'id'),
        );
       // $client  = getenv("REMOTE_ADDR");
       // dd($client);
        return view('frontend.template', $data);
    }

}
