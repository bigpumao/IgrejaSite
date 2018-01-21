<?php

namespace App\Http\Controllers\FrontEnd\SoundCloud;

use App\Model\Departamento\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoudCloud\Sound;
class SoundCloudController extends Controller
{
    private $soundcloud = 6;
    public function index()
    {
        $data = array(
            'titulo'        =>  'Galeria de Sons',
            'soundcloud'    =>  Sound::with('departamentos')->where('status',   true)->orderBy('id','desc')->paginate($this->soundcloud),

        );
        return view('frontend.soundcloud.index' , $data);
    }
    public function get(Request $request)
    {
        $data = array(
            'titulo'        =>  'Busca de Sons',
            'soundcloud'    =>  Sound::with('departamentos')->where('titulo','LIKE', "%$request->search%")->where('status', true)->paginate($this->soundcloud),
        );
        return view('frontend.soundcloud.search', $data);
    }
}
