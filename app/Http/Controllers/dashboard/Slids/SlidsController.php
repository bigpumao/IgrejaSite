<?php

namespace App\Http\Controllers\dashboard\Slids;

use App\Model\Slids\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use Auth;
use Image;
class SlidsController extends Controller
{
    public function index()
    {
        $data = array(
            'titulo' => 'Lista de Slids Show',
            'info' => 'Lista de Slids Show',
            'avatar' => Auth::user(),
        );

        return view('dashboard.slids.index', $data);
    }
    public function get_datatable()
    {
        $slids =Slide::select('id', 'titulo','status' , 'created_at' );

        return Datatables::of($slids)
            ->addColumn('action', function ($list) {
                return  '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->make(true);
    }
    public function create()
    {
        $data = array(
            'titulo' => 'Criando Slids Show',
            'info' => 'Criando de Slids Show',
            'avatar' => Auth::user(),
        );

        return view('dashboard.slids.create', $data);
    }
    public function store(Request $request)
    {

        $this->validate(request(), [
            'titulo'  =>  'required',
            'status'  =>  'required',
            'imagem'  =>  'required',
        ]);
       if($request->hasFile('imagem')){
           $imagem = $request->file('imagem');
           $filename = time() .'.'. $imagem->getClientOriginalExtension();
           Image::make($imagem)->resize(1280, 504)->save(public_path('/imagens/slids/' . $filename));
       }
       $slide = Slide::create([
            'titulo'    =>  $request->titulo,
           'status'     =>  $request->status,
           'imagem'     =>  $filename,
           'user_id'    =>  auth()->user()->id,
       ]);

       if($slide){
           return redirect()->route('slids.index')->with('msg','Slide Show Salvo com Sucesso');
       }else{
           return redirect()->back()->with('error','Não Foi possivel Salvar o Slide Show');
       }
    }
    public function edit($id)
    {
        $data = array(
            'titulo' => 'Criando Slids Show',
            'info' => 'Criando de Slids Show',
            'avatar' => Auth::user(),
            'slid'  =>  Slide::findOrFail($id),
        );

        return view('dashboard.slids.edit', $data);
    }
    public function update(Request $request, $id)
    {
        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $filename = time() .'.'. $imagem->getClientOriginalExtension();
            Image::make($imagem)->resize(1280, 504)->save(public_path('imagens/slids/'.$filename));

        $slid = new Slide();
        $show =$slid->findOrFail($id);
        $result = $show->update([
            'user_id'   =>  auth()->user()->id,
            'titulo'    =>  $request->titulo,
            'imagem'    =>  $filename,
            'status'    =>  $request->status,
        ]);
            if($result)
            {
                return redirect()->route('slids.index')->with('msg','Slide Show Atualizado com Sucesso');
            }else{
                return redirect()->back()->with('error','Não foi Possivel Atualizar o Slide Show');
            }
        }else{
            $slid = new Slide();
            $show =$slid->findOrFail($id);
            $result = $show->update([
                'user_id'   =>  auth()->user()->id,
                'titulo'    =>  $request->titulo,
                'imagem'    =>  $show->imagem,
                'status'    =>  $request->status,
            ]);
            if($result)
            {
                return redirect()->route('slids.index')->with('msg','Slide Show Atualizado com Sucesso');
            }else{
                return redirect()->back()->with('error','Não foi Possivel Atualizar o Slide Show');
            }
        }
    }
    public function destroy($id)
    {
        $result = Slide::where('id' , $id)->delete();
        if($result){
            return redirect()->route('slids.index')->with('msg','Slide Show Deletado com Sucesso');
        }else{
            return redirect()->back()->with('error','Não foi possivel deletar o Slide Show');
        }
    }}
