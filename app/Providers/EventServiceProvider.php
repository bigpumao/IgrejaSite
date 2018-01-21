<?php

namespace App\Providers;

use App\Events\NotificaArtigo;
use App\Events\NotificacaoArtigo;
use App\Events\NotificacaoContato;
use App\Events\VisualizacaoEvento;
use App\Listeners\NotificacaoContatoListenes;
use App\Listeners\NotificaFrontEndArtigo;
use App\Listeners\VisuarlizacaoArtigo;
use App\Listeners\VisuazlizacaoEventoListener;
use Illuminate\Support\Facades\Event;
use App\Events\VisualizacaoArtigo;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        VisualizacaoArtigo::class => [
            VisuarlizacaoArtigo::class,
        ],
        VisualizacaoEvento::class => [
            VisuazlizacaoEventoListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
