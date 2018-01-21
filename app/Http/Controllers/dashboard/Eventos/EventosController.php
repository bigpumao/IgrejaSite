<?php

namespace App\Http\Controllers\dashboard\Eventos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eventos\Evento;
use App\Model\Departamento\Departamento;
use Yajra\Datatables\Datatables;
use Validator;
use Auth;
use Image;

class EventosController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
        );
        return view('dashboard.eventos.texto.index', $data);
    }

    public function create() {
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
            'departamento' => Departamento::pluck('departamento', 'id'),
        );
        return view('dashboard.eventos.texto.create', $data);
    }

    public function get_datatable() {
        $post = Evento::select(['id', 'titulo', 'data_inicio', 'visualizacao' , 'data_fim', 'status']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }

    public function store(Request $request) {
        $eventos = new Evento();

        $this->validate(request(), [
            'departamento'      => 'required',
            'checkbox'          => 'required',
            'data_inicio'       => 'required',
            'data_fim'          => 'required',
            'status'            => 'required',
            'titulo'            => 'required',
            'descricao'         => 'required',
            'imagem'            => 'required',
            'horas'             => 'required',
            'semana'            => 'required',
            'local'             => 'required',
            'expirar'           => 'required',
        ]);

        if ($request->hasFile('imagem')) {
            $avatar = $request->file('imagem');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(1280, 504)->save(public_path('/imagens/eventos/' . $filename));
        }


        $departamento = Departamento::where('id', $request->departamento)->first();

        $evento = new Evento;
        $evento->user_id = auth()->user()->id;
        $evento->checkbox = $request->checkbox;
        $evento->semana = $request->semana;
        $evento->horas = $request->horas;
        $evento->data_inicio = $request->data_inicio;
        $evento->data_fim = $request->data_fim;
        $evento->status = $request->status;
        $evento->titulo = $request->titulo;
        $evento->descricao = $request->descricao;
        $evento->imagem = $filename;
        $evento->local  =   $request->local;
        $evento->expirar   = $request->expirar;
        $result = $evento->save();
        $departamento->eventos()->attach($evento);

        if ($result) {
            return redirect()->route('eventos.index')->with('msg', 'Eventos cadastrado com sucesso');
        } else {
            return redirect()->back()->with('info', 'Não foi possivel cadastrar o eventos');
        }
    }

    public function edit($id) {
        $evento = new Evento();
        $data = array(
            'titulo' => 'Eventos',
            'localizador' => 'Eventos',
            'info' => 'Eventos',
            'avatar' => Auth::user(),
            'update' => $evento->findOrFail($id),
            'departamento' => Departamento::pluck('departamento', 'id'),
        );
        return view('dashboard.eventos.texto.edit', $data);
    }

    public function update(Request $request, $id) {

        $this->validate(request(), [
            'departamento' => 'required',
            'semana' => 'required',
            'horas' => 'required',
        ]);

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagemPath = public_path('/imagens/eventos/' . $filename);
            Image::make($imagem)
                    ->resize(1280, 504)
                    ->save($imagemPath);



            $eventos = Evento::where('id', $id)->first();
            $eventos->user_id = auth()->user()->id;
            $eventos->checkbox = $request->checkbox;
            $eventos->semana = $request->semana;
            $eventos->horas = $request->horas;
            $eventos->data_inicio = $request->data_inicio;
            $eventos->data_fim = $request->data_fim;
            $eventos->status = $request->status;
            $eventos->titulo = $request->titulo;
            $eventos->descricao = $request->descricao;
            $eventos->imagem = $filename;
            $eventos->local  =  $request->local;
            $eventos->expirar   = $request->expirar;
            $result = $eventos->save();

            $eventos->departamentos()->sync($request->departamento);

            if ($result) {
                return redirect()->route('eventos.index')->with('msg', 'Evento atualizado com sucesso');
            } else {
                return redirect()->route('eventos.index')->with('msg', 'Não foi possivel atualizar o evento');
            }
        } else {

            //dd($request->all());

            $this->validate(request(), [
                'departamento' => 'required',
                'semana' => 'required',
                'horas' => 'required',
            ]);

            $eventos = Evento::where('id', $id)->first();
            $eventos->user_id = auth()->user()->id;
            $eventos->checkbox = $request->checkbox;
            $eventos->semana = $request->semana;
            $eventos->horas = $request->horas;
            $eventos->data_inicio = $request->data_inicio;
            $eventos->data_fim = $request->data_fim;
            $eventos->status = $request->status;
            $eventos->titulo = $request->titulo;
            $eventos->descricao = $request->descricao;
            $eventos->imagem = $eventos->imagem;
            $eventos->local =   $eventos->local;
            $eventos->expirar   = $request->expirar;
            $result = $eventos->save();

            $eventos->departamentos()->sync($request->departamento);
            if ($result) {
                return redirect()->route('eventos.index')->with('msg', 'Evento atualizado com sucesso');
            } else {
                return redirect()->route('eventos.index')->with('msg', 'Não foi possivel atualizar o evento');
            }
        }
    }

    public function destroy($id) {
        $evento = new Evento();
        $evnt = $evento->findOrFail($id);
        unlink(public_path('imagens/eventos/'. $evnt->imagem));
        $result = $evnt->delete($id);
        if ($result) {
            return redirect()->route('eventos.index')->with('msg', 'Evento excluido com sucesso');
        } else {
            return redirect()->route('eventos.index')->with('error', 'Não foi possivel excluir o evento');
        }
    }

}
