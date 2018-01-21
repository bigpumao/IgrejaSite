<?php

namespace App\Http\Controllers\dashboard\Album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Departamento\Departamento;
use App\Model\Album\ImagemAlbum;
use Image;
use DB;

class AlbumController extends Controller {

    private $album;
    private $paginate =  15;

    public function __contruct(Album $album) {
        $this->album = $album;
    }

    public function index() {
        $img = new ImagemAlbum();
               
        $data = array(
            'titulo' => 'Lista de Album',
            'localizador' => 'Listagem de Album',
            'info' => 'Listas de Album',
            'avatar' => Auth()->user(),
            'album' => Album::all(),
            'albuns'    =>      Album::with('departamentos')->orderBy('id' , 'desc')->paginate($this->paginate),
         
        );

        return view('dashboard.albuns.album.index', $data);
    }

    public function create() {

        $data = array(
            'titulo' => 'Criando novo Album',
            'localizador' => 'Criando novo album',
            'info' => 'Criando novo album',
            'avatar' => Auth()->user(),
            'departamento'   =>  Departamento::pluck('departamento' , 'id'),
        );
        return view('dashboard.albuns.album.create', $data);
    }

    public function store(Request $request) {
        
        $this->validate(request(),[
            'departamento'  =>  'required',
            'nome'          =>  'required',
            'descricao'     =>  'required',
            'imagem_capa'   =>  'required',
            'status'        =>  'required',
        ]);

        
       
        $album = new Album();
        if ($request->hasFile('imagem_capa')) {
            $imagem = $request->file('imagem_capa');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagePath = public_path('/imagens/album/capa_album/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagePath);

            $departamento = Departamento::where('id', $request->departamento)->first();        

            $album = new Album;
            $album->user_id = auth()->user()->id;
            $album->nome = $request->nome;
            $album->descricao = $request->descricao;
            $album->imagem_capa = $filename;
            $album->status  =   $request->status;
            $result = $album->save();

            $departamento->albuns()->attach($album);
            
            if ($result)
                return redirect()->route('album.index')->with('msg', 'Album Criado com sucesso');
            else {
                return redirect()->back()->with('msg', 'Não foi possivel criar o album');
            };
        }
    }
    public function edit($id) {
        
                $album = new Album();
                $data = array(
                    'titulo' => 'Edição do Album',
                    'localizador' => 'Editando album',
                    'info' => 'Editando album',
                    'avatar' => Auth()->user(),
                    'album' => $album->findOrFail($id),
                    'departamento'   =>  Departamento::pluck('departamento' , 'id'),
                );
        
        
                return view('dashboard.albuns.album.edit', $data);
            }

    public function update(Request $request, $id) {
        $this->validate(request(), [
            'departamento'  =>  'required',
        ]);
        if ($request->hasFile('imagem')) {
            // unlink(public_path('/imagem/album/capa_album/' . $alb->imagem_capa));
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();

            $imagemPath = public_path('imagens/album/capa_album/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagemPath);

            $album = Album::where('id', $id)->first();
            $album->user_id = auth()->user()->id;
            $album->status = $request->status;
            $album->nome = $request->nome;
            $album->descricao = $request->descricao;
            $album->imagem_capa = $filename;
            $result = $album->save();

            $departamento = Departamento::where('id' , $request->departamento)->first();
            $album->departamentos()->sync($departamento);

            if ($result) {
                return redirect()->route('album.index')->with('msg', 'Album Criado com sucesso');
            } else {
                return redirect()->back()->with('msg', 'Não foi possivel criar o album');
            }
        } else {

            $album = Album::where('id', $id)->first();
            $album->status = $request->status;
            $album->nome = $request->nome;
            $album->descricao = $request->descricao;
            $album->imagem_capa = $album->imagem_capa;
            $result = $album->save();

            $departamento = Departamento::where('id' , $request->departamento)->first();
            $album->departamentos()->sync($departamento);
            if ($result) {
                return redirect()->route('album.index')->with('msg', 'Album Atualizado com sucesso');
            } else {
                return redirect()->back()->with('msg', 'Não foi possivel atualizar o album');
            }
        }
    }

    public function destroy($id) {
        $album = Album::with('imagens')->where('id', $id)->first();
        $imagens = ImagemAlbum::with('album')->where('album_id', $album->id )->get();
        
        if($album)
        {
            unlink(public_path('/imagens/album/capa_album/' . $album->imagem_capa));
            foreach ($imagens as $imagem) {
                unlink(public_path('/imagens/album/imagens/' . $imagem->imagem));
            }
            $album->delete();
            return redirect()->back()->with('msg', 'Album Deletado com sucesso');
        }
        else
        {
            return redirect()->back()->with('msg', 'Não existe esse album');
        }

    }

}
