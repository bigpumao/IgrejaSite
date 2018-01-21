@extends('frontend.template')
@section('content')
@section('meta')
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$artigo->titulo}}"/>
    <meta property="og:description" content="{{$artigo->descricao}}"/>
    <meta property="og:image" content="{{url('/')}}/imagens/artigo/{{$artigo->imagem}}"/>
@stop
<div class="nav-backed-header parallax"
     style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('front.index')}}">Home</a></li>
                    <li><a href="{{route('blog.index')}}">Todos os Artigos</a></li>
                    <li class="active">Artigo</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header -->
<!-- Start Page Header -->
{{--<div class="page-header">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-sm-8">--}}
{{--<h1>Blog</h1>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!-- End Page Header -->
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <header class="single-post-header clearfix">
                        <h2 class="post-title">{{$artigo->titulo}}</h2>
                    </header>
                    <article class="post-content"> <span class="post-meta meta-data"><span><i
                                        class="fa fa-calendar"></i> Publicado em {{date('d/m/Y' , strtotime($artigo->created_at))}}</span>
                            @foreach($artigo->departamentos as $dep)
                                <span><i class="fa fa-info"></i> Departamento: {{$dep->departamento}}</span></span>
                        @endforeach
                        <div class="featured-image"><img src="/imagens/artigo/{{$artigo->imagem}}" alt=""></div>
                        <p>{!! $artigo->descricao !!}</p>
                        <blockquote>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="/uploads/avatars/{{$artigo->user->avatar}}" alt="" width="60"
                                         height="60">
                                </div>
                                <div class="col-md-10">
                                    <h4>Sobre o Autor</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 10px;">
                                       <h5 style="color: #848484">{{$artigo->user->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            @if($artigo->user->biografia == null)
                                <p>Biografia não cadastrada</p>
                            @else
                                <p>{{$artigo->user->biografia->descricao}}</p>
                            @endif
                        </blockquote>

                    </article>
                    <section class="post-comments">
                        @include('frontend.scripts.fb.botao-compartilhar')
                    </section>
                    <section class="post-comments" id="comments">
                        <h3><i class="fa fa-comment"></i> Comentários </h3>
                        <ol class="comments">

                        </ol>
                    </section>

                    <section class="post-comment-form">
                        <div class="fb-comments" data-href="{{Request::url()}}" data-width="972"
                             data-numposts="10"></div>
                    </section>
                </div>
                <!-- Começo do SideBar -->
                <div class="col-md-3 sidebar">
                    <div class="widget sidebar-widget search-form-widget">
                        {!! Form::open(array('route'    =>  'blog.search',  'method'    =>  'POST')) !!}
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control" placeholder="Procurar um Artigo">
                            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"></i></button></span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="widget sidebar-widget">
                        <div class="sidebar-widget-title">
                            <h3>Artigo por Departamento</h3>
                        </div>
                        <ul>
                            @foreach($departamento as $dep)
                                <li>
                                    <a href="{{url('/')}}/artigos/search/departamento/{{$dep->id}}">{{$dep->departamento}}</a>
                                    <!--Quantidade de Posts--></li>
                            @endforeach
                        </ul>
                    </div>
                    {{--<div class="widget sidebar-widget">--}}
                    {{--<div class="sidebar-widget-title">--}}
                    {{--<h3>Post Tags</h3>--}}
                    {{--</div>--}}
                    {{--<div class="tag-cloud"><a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a--}}
                    {{--href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a>--}}
                    {{--<a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a>--}}
                    {{--<a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a>--}}
                    {{--<a href="#">Worship</a></div>--}}
                    {{--</div>--}}
                </div><!--Fim do SideBar-->
            </div>
        </div>
    </div>
</div>
@endsection