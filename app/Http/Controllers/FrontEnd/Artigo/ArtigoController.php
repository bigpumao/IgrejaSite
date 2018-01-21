<?php

namespace App\Http\Controllers\FrontEnd\Artigo;

use App\Events\VisualizacaoArtigo;
use App\Model\Departamento\Departamento;
use App\Model\Postagem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;

class ArtigoController extends Controller
{
    private $artigo = 6 ;
    private $departamento = 6 ;
    public function index()
    {

        $data = array(
            'titulo'    =>  'Todos os Artigos',
            'artigos'   =>  Postagem::with('departamentos')->where('status' , true)->orderBy('id' , 'desc')->paginate($this->artigo),
            'departamento'  =>  Departamento::with('postagems')->get(),
            );

        return view('frontend.artigo.todos-artigos' , $data);
    }

    public function get($id)
    {
        $artigo = Postagem::with('departamentos')->where('id' , $id)->first();
        Event::fire(new VisualizacaoArtigo($artigo));
        $data = array(
            'titulo'    =>  $artigo->titulo,
            'artigo'    =>  $artigo,
            'departamento'  =>  Departamento::with('postagems')->get(),
        );

        return view('frontend.artigo.artigo' , $data);
    }
    public function search(Request $request)
    {
        $data = array(
            'titulo'        =>  'Busca por Artigo',
            'artigos'       =>  Postagem::with('departamentos')->where('titulo' , 'LIKE', "%$request->search%")->paginate($this->artigo),
            'departamento'  =>  Departamento::with('postagems')->get(),
        );
        return view('frontend.artigo.search' , $data);
    }
    public function searchDepartamentoGet($id)
    {

        $data = array(
            'titulo'        =>  'Artigo Por Departamento',
            'departamento'  =>  Departamento::find($id)->postagems()->paginate($this->departamento),
            'imagem'        =>  Departamento::where('id' , $id)->first(),
            'searchdep'     =>  Departamento::pluck('departamento' , 'id'),
        );

        return view('frontend.artigo.departamentos' , $data);
    }
    public function searchDepartamentoPost(Request $request)
    {

        $this->validate(request(),[
            'dep'  =>  'required',
        ]);
        $data = array(
            'titulo'        =>  'Artigo Por Departamento',
            'departamento'  =>  Departamento::find($request->dep)->postagems()->paginate($this->departamento),
            'imagem'        =>  Departamento::where('id' , $request->dep)->first(),
            'searchdep'     =>  Departamento::pluck('departamento' , 'id'),
        );

        return view('frontend.artigo.departamentos' , $data);
    }
}
