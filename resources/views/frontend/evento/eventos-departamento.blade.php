@extends('frontend.template')
@section('content')
    <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="{{route('eventos.todos')}}">Todos os Eventos</a></li>
                        <li class="active">Eventos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--Barra de Proucura-->
    <div class="page-header">
        <div class="container">
            <div class="row">
                {{Form::open(array('route'    =>  'eventos.post.seach' , 'method'   =>  'POST'))}}
                <div class="col-md-7 col-sm-5 col-xs-8">
                    <h1>Eventos por Departamento</h1>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4">

                    {{Form::select('search' , $departamentos ,null, ['class'    =>  'form-control'])}}
                </div>
                <div class="col-md-2">
                    {{Form::submit('Buscar' , ['class'  =>  'btn btn-default btn-md'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="grid-holder col-3 events-grid">
                            @if($eventos->count() >= 1)
                                @foreach($eventos as $evento)
                                    <li class="grid-item format-standard">
                                        <div class="grid-item-inner"><a href="{{url('eventos/')}}/{{$evento->id}}"
                                                                        class="media-box"> <img
                                                        src="/imagens/eventos/{{$evento->imagem}}" alt=""> </a>
                                            <div class="grid-content">
                                                <h3><a href="single-event.html">{{$evento->titulo}}</a></h3>
                                                <p>{!! substr($evento->descricao  , 0 , 200)!!} ..</p>
                                            </div>
                                            <?php
                                            $data_inicio = explode('-', $evento->data_inicio);
                                            $data_fim = explode('-', $evento->data_fim);
                                            ?>
                                            <ul class="info-table">
                                                <li><i class="fa fa-calendar"></i>
                                                    <small>Data do Inicio
                                                    </small>{{$data_inicio[2].'/'.$data_inicio[1].'/'.$data_inicio[0]}}
                                                </li>
                                                <li><i class="fa fa-calendar"></i>
                                                    <small>Data do Fim
                                                    </small>{{$data_fim[2].'/'.$data_fim[1].'/'.$data_fim[0]}}</li>
                                                <li><i class="fa fa-clock-o"></i>
                                                    <small>{{$evento->horas}} | {{$evento->semana}}</li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <h1><strong>Nenhum evento foi encontrado para esse Departamento</strong></h1>
                            @endif


                        </ul>
                        <ul class="pull-right">
                            {{$eventos->links()}}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection