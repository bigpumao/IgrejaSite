@extends('frontend.template')
@section('content')
@section('meta')
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$evento->titulo}}"/>
    <meta property="og:description" content="{{$evento->descricao}}"/>
    <meta property="og:image" content="{{url('/')}}/imagens/eventos/{{$evento->imagem}}"/>
@stop
<div class="nav-backed-header parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li><a href="{{route('eventos.todos')}}">Todos os Eventos</a></li>
                    <li class="active">Evento</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header -->
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-8">
                <h1>{{$evento->titulo}}</h1>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-4"><a href="{{route('eventos.todos')}}"
                                                       class="pull-right btn btn-primary">Todos os Eventos</a></div>
        </div>
    </div>
</div>
<!-- End Page Header -->
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <header class="single-post-header clearfix">

                        <nav class="btn-toolbar pull-right">
                            <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button"
                                 data-size="large"
                                 data-mobile-iframe="true">
                                @include('frontend.scripts.fb.botao-compartilhar')
                            </div>
                        </nav>
                        <h2 class="post-title">{{$evento->titulo}}</h2>
                    </header>
                    <article class="post-content">
                        <div class="event-description"><img style="height: 600px;"
                                                            src="/imagens/eventos/{{$evento->imagem}}"
                                                            class="img-responsive">
                            <div class="spacer-20"></div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Detalhes do Evento</h3>
                                        </div>
                                        <?php
                                        $data_inicio = explode('-', $evento->data_inicio);
                                        $data_fim = explode('-', $evento->data_fim);
                                        ?>
                                        <div class="panel-body">
                                            <ul class="info-table">
                                                <li><i class="fa fa-calendar"></i> <strong></strong> <strong>Data
                                                        Início:</strong> {{$data_inicio[2].'/'.$data_inicio[1].'/'.$data_inicio[0]}}
                                                    | <strong>Data
                                                        Fim:</strong> {{$data_fim[2].'/'.$data_fim[1].'/'.$data_fim[0]}}
                                                </li>
                                                <li>
                                                    <i class="fa fa-clock-o"></i><strong>{{$evento->semana}}</strong>
                                                    as<strong> {{$evento->horas}}</strong></li>
                                                <li>
                                                    <i class="fa fa-location-arrow"></i><strong> {{$evento->local}}</strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{!! $evento->descricao !!}</p>
                        </div>
                    </article>
                </div>
                <!-- Start Sidebar -->
                <div class="col-md-3 sidebar">
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h3>Próximos Eventos</h3>
                        </div>
                        <ul>
                            @foreach($ultimosEventos as $evento)
                                <li class="item event-item clearfix">
                                    <div class="event-date">
                                        <?php
                                        $mes = explode('-', $evento->data_inicio);
                                        //dd($mes);
                                        ?>
                                        <?php
                                        switch ($mes[1]) {
                                        case "01":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Jan</span>
                                        <?php break;?>
                                        <?php case "02":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Fev</span>
                                        <?php break;?>
                                        <?php case "03":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Mar</span>
                                        <?php break;?>
                                        <?php case "04":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Abr</span>
                                        <?php break;?>
                                        <?php case "05":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Mai</span>
                                        <?php break;?>
                                        <?php case "06":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Jun</span>
                                        <?php break;?>
                                        <?php case "07":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Jul</span>
                                        <?php break;?>
                                        <?php case "08":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Ago</span>
                                        <?php break;?>
                                        <?php case "09":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Set</span>
                                        <?php break;?>
                                        <?php case "10":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Out</span>
                                        <?php break;?>
                                        <?php case "11":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Nov</span>
                                        <?php break;?>
                                        <?php case "12":?>
                                        <span class="date">{{$mes[2]}}</span> <span class="month">Dez</span>
                                        <?php break;?>



                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="event-detail">
                                        <h4><a href="{{url('/')}}/eventos/{{$evento->id}}">{{$evento->titulo}}</a>
                                        </h4>
                                        <span class="event-dayntime meta-data">{{$evento->semana}}
                                            | {{$evento->horas}}</span></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">

                            <h3>Eventos por Departamentos</h3>
                        </div>

                        <ul>
                            @foreach($departametos as $dep)

                                <li><a href="{{url('/')}}/eventos/search/{{$dep->id}}">{{$dep->departamento}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Recent Posts Widget -->
                    <div class="widget-recent-posts widget">
                        <div class="sidebar-widget-title">
                            <h3>Artigos Recentes</h3>
                        </div>
                        <ul>
                            @foreach($artigos as $artigo)
                                <li class="clearfix"><a href="{{url('artigos/get/')}}/{{$artigo->id}}"
                                                        class="media-box post-image"> <img
                                                src="/imagens/artigo/{{$artigo->imagem}}" alt=""
                                                class="img-thumbnail"> </a>
                                    <div class="widget-blog-content"><a
                                                href="{{url('artigos/get/')}}/{{$artigo->id}}">{{$artigo->titulo}}</a>
                                        <span class="meta-data"><i
                                                    class="fa fa-calendar"></i> {{date('d/m/Y' , strtotime($artigo->created_at))}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
