<?php

namespace App\Http\Controllers\FrontEnd\Eventos;

use App\Events\VisualizacaoEvento;
use App\Http\Controllers\Controller;
use App\Model\Departamento\Departamento;
use App\Model\Eventos\Evento;
use App\Model\Postagem;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Request;


class EventoController extends Controller
{
    private $evento = 6;

    public function index()
    {
        $data = array(
            'titulo' => 'Todos os eventos',
            'eventos' => Evento::where('status', true)->orderBy('id', 'asc')->paginate($this->evento),
        );
        return view('frontend.evento.index', $data);

    }

    public function get($id)
    {
        $eventos = Evento::FindOrFail($id);
        $data = array(
            'titulo' => $eventos->titulo,
            'evento' => $eventos,
            'artigos' => Postagem::with('departamentos')->where('status', true)->orderByDesc('id')->paginate(3),
            'ultimosEventos' => Evento::with('departamentos')->where('status', true)->orderByDesc('data_inicio')->paginate(3),
            'departametos' => Departamento::with('eventos')->get(),
        );
        // dd($data['ultimosEventos']);
        \Event::fire(new VisualizacaoEvento($eventos));
        return view('frontend.evento.eventos-simples', $data);
    }

    public function search($id)
    {
        $data = array(
            'titulo' => 'Eventos por Departamento',
            'eventos' => Departamento::findOrFail($id)->eventos()->paginate($this->evento),
            'departamentos' =>  Departamento::pluck('departamento' , 'id'),
        );
        return view('frontend.evento.eventos-departamento', $data);

    }
    public function searchPost()
    {

        $data = array(
            'titulo' => 'Eventos por Departamento',
            'eventos' => Departamento::findOrFail(Request::get('search'))->eventos()->paginate($this->evento),
            'departamentos' =>  Departamento::pluck('departamento' , 'id'),
        );
        return view('frontend.evento.eventos-departamento', $data);
    }

    public function calendario()
    {
        $events = [];
        $data = Evento::where('status' , true)->where('expirar', true)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->titulo,
                    true,
                    new \DateTime($value->data_inicio),
                    new \DateTime($value->data_fim . ' +1 day'),
                    null,
                    // Add cor e link no evento
                    [
                        'color' => '#080a91',
                        'url' => \Request::getBaseUrl() . '/eventos/' . $value->id,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        //dd($eventos);
        return view('frontend.evento.calendario', compact('calendar'));
    }
}
