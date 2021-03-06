@extends('frontend.template')
@section('content')
    <div class="nav-backed-header parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li class="active">Contato</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->

    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="row">
                        @if(count('errors'))
                            @foreach($errors->all() as $error)
                               <h3><li class="alert alert-danger">{{$error}}</li></h3>
                            @endforeach
                        @endif
                        <div class="col-md-12">
                            @if(Session::has('msg'))
                                <div id="FrontEndo" class="alert alert-success"><strong>
                                        <center>{{Session::get('msg')}}</center>
                                    </strong></div>
                            @elseif(Session::has('error'))
                                <div id="msg" class="alert alert-danger"><strong>
                                        <center>{{Session::get('error')}}</center>
                                    </strong></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-9">
                        <header class="single-post-header clearfix">
                            <h2 class="post-title">Localização da Igreja de Deus em Luziânia</h2>
                        </header>
                        <div class="post-content">
                            <div id="gmap">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d795.4782909314299!2d-47.9229453574898!3d-16.258163944538072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93599820565e1501%3A0x311b502163682522!2sAv.+Contorno%2C+50+-+Parque+Estrela+Dalva+I%2C+Luzi%C3%A2nia+-+GO%2C+72804-020!5e1!3m2!1spt-BR!2sbr!4v1503953087881"
                                        width="600" height="450" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="row">
                                {!!Form::open(array('route'  =>  'contato.store' , 'method'  =>  'POST'))!!}
                                <div class="col-md-6 margin-15">
                                    <div class="form-group">
                                        {!!Form::text('nome' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Nome *'])!!}

                                    </div>
                                    <div class="form-group">
                                        {!!Form::text('email' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'E-Mail *'])!!}
                                    </div>
                                    <div class="form-group">
                                        {!!Form::text('telefone' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Telefone *'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!!Form::textarea('mensagem' , null, ['class'   =>   'form-control input-lg', 'placeholder' =>  'Escreva sua mensagem *'])!!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input id="submit" type="submit" class="btn btn-primary btn-lg pull-right"
                                           value="Enviar">
                                </div>
                                {!!Form::close()!!}
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div id="message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        <!-- Recent Posts Widget -->
                        <div class="widget-recent-posts widget">
                            <div class="sidebar-widget-title">
                                <h3>Artigos mais visualizados</h3>
                            </div>
                            <ul>
                                @foreach($artigos as $artigo )
                                    <li class="clearfix"><a href="{{url('/')}}/artigos/get/{{$artigo->id}}"
                                                            class="media-box post-image"> <img
                                                    src="/imagens/artigo/{{$artigo->imagem  }}" alt=""
                                                    class="img-thumbnail"> </a>
                                        <div class="widget-blog-content"><a
                                                    href="{{url('/')}}/artigos/get/{{$artigo->id}}">{{$artigo->titulo}}</a>
                                            <span class="meta-data"><i
                                                        class="fa fa-calendar"></i>{{date('d/m/Y' , strtotime($artigo->created_at))}}</span>
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