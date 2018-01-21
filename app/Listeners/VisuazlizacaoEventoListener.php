<?php

namespace App\Listeners;

use App\Events\VisualizacaoEvento;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisuazlizacaoEventoListener
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
     * @param  VisualizacaoEvento  $event
     * @return void
     */
    public function handle(VisualizacaoEvento $event)
    {
        $visualiza = $event->visualizaEvento;
        $visualiza->visualizacao++;
        $visualiza->save();
    }
}
