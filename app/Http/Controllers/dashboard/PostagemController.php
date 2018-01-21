<?php

namespace App\Http\Controllers\dashboard;


use App\Events\NotificaArtigo;
use App\Events\NotificacaoArtigo;
use App\Http\Controllers\Controller;
use App\Model\Album\Album;
use App\Model\Aviso\Aviso;
use App\Model\Departamento\Departamento;
use App\Model\Download\Download;
use App\Model\Eventos\Evento;
use App\Model\FrontEnd\Contato;
use App\Model\FrontEnd\PedidoOracao;
use App\Model\Membro;
use App\Model\Postagem;
use App\Model\Slids\Slide;
use App\Model\SoudCloud\Sound;
use App\Model\YouTube\Youtube;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;
use Yajra\Datatables\Facades\Datatables;


class PostagemController extends Controller
{

    public function manu_principal()
    {

        $data = array(
            'titulo' => 'Menu Principal',
            'localizador' => 'Menu de opções',
            'info' => 'Menu de opções',
            'avatar' => Auth::user(),
            'quantUser' => User::all()->count(),
            'quantPost' => Postagem::all()->count(),
            'quantMembros' => Membro::all()->count(),
            'quantOracao' => PedidoOracao::all()->count(),
            'quantAlbum' => Album::all()->count(),
            'quantEventos' => Evento::all()->count(),
            'quantDownload' => Download::all()->count(),
            'quantContato' => Contato::all()->count(),
            'acl' => User::all(),
            'quantYouTube' => Youtube::all()->count(),
            'quantSoundCloud' => Sound::all()->count(),
            'quantSlides' => Slide::all()->count(),
            'quantAvisos' => Aviso::all()->count(),

        );

        return view('dashboard.index', $data);
    }

    public function index(Postagem $postagem)
    {

        $data = array(
            'titulo' => 'Listagem das Postagem',
            'info' => 'Lista de Postagem',
            'avatar' => Auth::user(),


        );
        return view('dashboard.postagem.listagem', $data);
    }

    public function get_datatable()
    {
        $relations = Postagem::with('departamentos')->where('user_id', auth()->user()->id)->get(['id', 'titulo', 'visualizacao', 'created_at', 'status']);


        return Datatables::of($relations)
            ->addColumn('action', function ($list) {
                return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary"><i class="fa fa-folder-open-o"></i> Show</a>'
                    . '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

    public function create()
    {
        $data = array(
            'titulo' => 'Criando novo Artigo',
            'info' => 'Novo Artigo',
            'avatar' => Auth::user(),
            'departamento' => Departamento::pluck('departamento', 'id'),

        );

        return view('dashboard.postagem.create', $data);
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'status' => 'required',
            'titulo' => 'required',
            'imagem' => 'required',
            'descricao' => 'required',
            'departamento' => 'required',
        ]);

        $departamento = new Departamento();

        $postagem = new Postagem();
        $findDep = $departamento->where('id', $request->departamento)->first();


        if ($request->hasFile('imagem')) {

            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            Image::make($imagem)->resize(800, 600)->save(public_path('/imagens/artigo/' . $filename));


            $postagem->user_id = auth()->user()->id;
            $postagem->titulo = $request->titulo;
            $postagem->imagem = $filename;
            $postagem->descricao = $request->descricao;
            $postagem->status = $request->status;
            $return = $postagem->save();



                 $findDep->postagems()->attach($postagem);

            if ($return) {
                \Event::fire(new NotificacaoArtigo($postagem));
                return redirect()->route('listagem')->with('msg', 'Artigo cadastrado com sucesso!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function show($id)
    {
        $data = array(
            'titulo' => 'Visualizaçao da postagem',
            'localizador' => 'Postagem ',
            'info' => 'Postagem',
            'avatar' => Auth::user(),
            'blog' => Postagem::with('departamentos')
                ->where('id', $id)
                ->first(),
        );


        return view('dashboard.postagem.show', $data);
    }


    public function edit($id)
    {
        $data = array(
            'titulo' => 'Editando a postagem',
            'localizador' => 'Edição ',
            'info' => 'Edição do Post',
            'avatar' => Auth::user(),
            'postagem' => Postagem::find($id),
            'departamento' => Departamento::pluck('departamento', 'id'),
        );
        return view('dashboard.postagem.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'departamento' => 'required',
        ]);

        if ($request->hasFile('imagem') == true) {

            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            Image::make($imagem)->resize(800, 600)->save(public_path('/imagens/artigo/' . $filename));

            $postagem = Postagem::where('id', $id)->first();

            $postagem->user_id = auth()->user()->id;
            $postagem->titulo = $request->titulo;
            $postagem->status = $request->status;
            $postagem->imagem = $filename;
            $postagem->descricao = $request->descricao;
            $return = $postagem->save();


            $postagem->departamentos()->sync($request->departamento);
            if ($return) {


                return redirect()->route('listagem')->with('msg', 'Artigo atualizado com sucesso!');
            } else {
                return redirect()->back();
            }
        } else {

            $this->validate(request(), [
                'departamento' => 'required',
            ]);

            $postagem = Postagem::where('id', $id)->first();
            $postagem->user_id = auth()->user()->id;
            $postagem->titulo = $request->titulo;
            $postagem->status = $request->status;
            $postagem->imagem = $postagem->imagem;
            $postagem->descricao = $request->descricao;
            $return = $postagem->save();

            $postagem->departamentos()->sync($request->departamento);
            if ($return) {
                return redirect()->route('listagem')->with('msg', 'Artigo atualizado com sucesso!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function destroy($id)
    {
        $result = Postagem::where('id', $id)->first()->delete();

        if ($result) {
            return redirect()->route('listagem')->with('msg', 'Artigo deletado com sucesso!');
        } else {
            return redirect()->back();
        }
    }

}
