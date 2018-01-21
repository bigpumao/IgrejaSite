<?php

namespace App\Http\Controllers\dashboard\Eventos;

use App\Model\Departamento\Departamento;
use App\Model\Eventos\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Eventos\Video;
use Yajra\Datatables\Facades\Datatables;
use Auth;
class EventosVideoController extends Controller
{
    public function index(){
        $data = array(
            'titulo' => 'Eventos em Vídeo',
            'localizador' => 'Eventose em Vídeo',
            'info' => 'Eventos em Vídeo',
            'avatar' => Auth::user(),
        );
        return view('dashboard.eventos.video.index', $data);
    }
     public function get_datatable() {
        $d = Video::select(['id', 'titulo', 'frame', 'status', 'created_at']);

        return Datatables::of($d)
                        ->addColumn('action', function ($list) {
                            return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->make(true);
    }
    public function create(){
        $data = array(
            'titulo' => 'Adicionando Vídeos do YoTtube',
            'info' => 'Adicionando Vídeos do YoTtube',
            'avatar' => Auth()->user(),
            'departamento'  =>  Departamento::pluck('departamento' , 'id'),
        );
        return view('dashboard.eventos.video.create',$data);
    }
    public function store(Request $request){

       $this->validate(request() , [
           'titulo'         =>  'required',
           'frame'          =>  'required',
           'status'         =>  'required',
           'descricao'      =>  'required',
           'departamento'   =>  'required',
           ]);

       $dep = Departamento::where('id' , $request->departamento)->first();

       $video = new Video();
       $video->user_id = auth()->user()->id;
       $video->titulo = $request->titulo;
       $video->frame = $request->frame;
       $video->status = $request->status;
       $video->descricao = $request->descricao;
       $result = $video->save();
       $dep->videos()->attach($video);
       if($result){
           return redirect()->route('video.index')->with('msg','Vídeo do YouTube cadastrado com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel cadastrar Vídeo do YouTube');
       }
    }
    public function edit($id){
        $video = new Video();
        $result = $video->findOrFail($id);
       
        $data = array(
            'titulo' => 'Editanto Vídeos do YoTtube',
            'info' => 'Editanto Vídeos do YoTtube',
            'avatar' => Auth()->user(),
            'video' =>  $result,
            'departamento'  =>  Departamento::pluck('departamento' , 'id'),
        );
        return view('dashboard.eventos.video.edit',$data);
        
    }
    public function update(Request $request , $id){
        $this->validate(request(),[
            'departamento'  =>  'required',
        ]);

        $video = Video::where('id', $id)->first();
        $video->user_id = auth()->user()->id;
        $video->frame = $request->frame;
        $video->status = $request->status;
        $video->descricao = $request->descricao;
        $video->titulo = $request->titulo;
        $result = $video->save();
        $video->departamentos()->sync($request->departamento);
       if($result){
           return redirect()->route('video.index')->with('msg','Vídeo do You Tube atualizada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel atualizar Vídeo do You Tube');
       }
        
    }
    public function destroy($id){
        $video = new Video();
        $result = $video->findOrFail($id);
        $q = $result->delete();
        if($q){
           return redirect()->route('video.index')->with('msg','Video You Tube Deletada com sucesso');
       }else{
           return redirect()->back()->with('error','Não foi possivel deletar Vídeo do You Tube ');
       }
    }
}
