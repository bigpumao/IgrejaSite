<?php

namespace App\Http\Controllers\dashboard\Grafico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use Auth;
use App\Model\Postagem;
use App\User;
class ChartsController extends Controller
{
    public function area()
    {


        $data = array(
            'titulo' => 'Gráfico referente a quantidade visualização por grupo de artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(auth()->user(), 'area', 'highcharts')->data(Postagem::where('user_id' , auth()->user()->id)->get(['visualizacao']))
                ->title('Quantidade de artigos e visualizações (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->elementLabel('Total de Artigos')
                ->groupBy('visualizacao'),


        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function donut()
    {


        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(auth()->user(), 'donut', 'highcharts')->data(Postagem::where('user_id' , auth()->user()->id)->get(['visualizacao']))
                ->title('Quantidade de artigos e visualizações (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('visualizacao')

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function user()
    {


        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(auth()->user(), 'donut', 'highcharts')->data(Postagem::with('user')->get())
                ->title('Quantidade de artigos por usuário')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('user_id' , 'user.name')

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function torre()
    {
        $artigo = Postagem::where('user_id' , auth()->user()->id)->get(['titulo']);

        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(auth()->user(), 'bar', 'highcharts')->data(Postagem::with('user')->where('user_id' , auth()->user()->id)->get())
                ->title('Quantidade de artigos e visualizações (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('visualizacao')
        );

        return view('dashboard.grafico.grafico', $data);

    }

    public function pizza()
    {


        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(auth()->user(), 'pie', 'highcharts')->data(Postagem::where('user_id' , auth()->user()->id)->get(['visualizacao']))
                ->title('Quantidade de artigos e visualizações (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('visualizacao')


        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function trintaDias()
    {

        //Criar um gráfico que mostre a quantidade de visualização pela data que foi criado.

        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(Postagem::where('user_id' , auth()->user()->id)->get(), 'bar', 'highcharts')
                ->title('Quantidade de artigo nos últimos 30 dias (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->lastByDay(30,true)

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function mes()
    {

        //Criar um gráfico que mostre a quantidade de visualização pela data que foi criado.

        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(Postagem::where('user_id' , auth()->user()->id)->get(), 'bar', 'highcharts')
                ->title('Artigo feito no mês atual (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupByDay()

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }

    public function ano()
    {

        //Criar um gráfico que mostre a quantidade de visualização pela data que foi criado.

        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(Postagem::where('user_id' , auth()->user()->id)->get(), 'bar', 'highcharts')
                ->title('Quantidade de artigo por ano (Individual)')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupByYear()

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
    public function artigoAll()
    {

        //Criar um gráfico que mostre a quantidade de visualização pela data que foi criado.

        $data = array(
            'titulo' => 'Grafico de visualização de Artigos',
            'info' => 'Grafico de visualização de Artigos',
            'avatar' => Auth::user(),
            'chart' => Charts::database(Postagem::all(), 'area', 'highcharts')
                ->title('Todos os artigos por ano')
                ->elementLabel("Total")
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupByYear()

        );
        //dd($data['chart']);
        return view('dashboard.grafico.grafico', $data);

    }
}
