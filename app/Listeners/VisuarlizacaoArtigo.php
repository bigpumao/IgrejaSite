<?php

namespace App\Listeners;

use App\Events\VisualizacaoArtigo;
use App\Model\Eventos\Evento;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisuarlizacaoArtigo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VisualizacaoArtigo  $event
     * @return void
     */
    public function handle(VisualizacaoArtigo $event)
    {
        $artigo = $event->artigo;
        $artigo->visualizacao++;
        $artigo->save();
    }
}
