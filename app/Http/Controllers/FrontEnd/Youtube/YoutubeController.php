<?php

namespace App\Http\Controllers\FrontEnd\Youtube;

use App\Http\Controllers\Controller;
use App\Model\Departamento\Departamento;
use App\Model\YouTube\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    private $youtube = 3;

    public function index()
    {
        $data = array(
            'titulo' => 'Galeria Vídeos',
            'youtube' => Youtube::with('departamentos')->where('status', true)->orderBy('id', 'desc')->paginate($this->youtube),
            'departamento' => Departamento::with('youtubes')->get(),
        );

        return view('frontend.youtube.index', $data);
    }

    public function get(Request $request)
    {
        $data = array(
            'titulo' => 'Busca de Vídeos',
            'youtube' => Youtube::with('departamentos')->where('titulo', 'LIKE', "%$request->search%")->where('status', true)->paginate($this->youtube),
            'departamento' => Departamento::with('youtubes')->get(),
        );

        return view('frontend.youtube.search', $data);
    }

    public function searchDepartamentoGet($id)
    {
        $data = array(
            'titulo'    =>  'Busca por Video por Departamento',
            'youtube'   =>  Departamento::findOrFail($id)->youtubes()->paginate($this->youtube),
            'departamento' => Departamento::with('youtubes')->get(),
        );
        return view('frontend.youtube.departamento', $data);
    }

    public function searchDepartamentoPost(Request $request)
    {
        dd($request->all());
    }

}
