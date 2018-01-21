<?php

namespace App\Http\Controllers\dashboard\QuadroAvisos;

use App\Model\Aviso\Aviso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class QuadroAvisosController extends Controller
{
    public function index()
    {
        $data = array(
            'titulo'    =>  'Quadro de Avisos',
            'avatar'    =>  \Auth::User(),
            'info'      =>  'Quadro de Avisos',
        );
        return view('dashboard.quadro-aviso.index', $data);
    }
    public function get_datatable() {
        $post = Aviso::select(['id', 'titulo', 'semana', 'created_at']);

        return Datatables::of($post)
            ->addColumn('action', function ($list) {
                return  '<a href="avisos/edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                    . '<a href="avisos/destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
    public function create()
    {
        $data = array(
            'titulo'    =>  'Quadro de Avisos',
            'avatar'    =>  \Auth::User(),
            'info'      =>  'Quadro de Avisos',
        );
        return view('dashboard.quadro-aviso.create' , $data);
    }
    public function store(Request $request)
    {
        $aviso = new Aviso();
        $result = $aviso->create($request->all());
        if($result){
            return redirect()->route('aviso.index')->with('msg', 'Aviso Salvo com Sucesso');
        }else{
            return redirect()->back()->with('msg', 'Não foi Possivel Salvar o Aviso');
        }

    }
    public function edit($id)
    {
        $data = array(
            'titulo'    =>  'Quadro de Avisos',
            'avatar'    =>  \Auth::User(),
            'info'      =>  'Quadro de Avisos',
            'aviso'     =>  Aviso::findOrFail($id),
        );
        return view('dashboard.quadro-aviso.edit', $data);

    }
    public function update(Request $request, $id)
    {
        $aviso = Aviso::FindOrFail($id);
        $result = $aviso->update($request->all());

        if($result){
            return redirect()->route('aviso.index')->with('msg', 'Aviso Atualizado com Sucesso');
        }else{
            return redirect()->back()->with('msg', 'Não foi Possivel Atualizar o Aviso');
        }
    }
    public function destroy($id)
    {
        $result = Aviso::where('id' , $id)->delete();

        if($result){
            return redirect()->route('aviso.index')->with('msg', 'Aviso Deletedo com Sucesso');
        }else{
            return redirect()->back()->with('msg', 'Não foi Possivel Deletar o Aviso');
        }
    }
}
