@extends('frontend.template')
@section('content')
    <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/todos-artigos.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog</li>
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
    {{--<div class="col-md-12">--}}
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
                    <div class="col-md-9 posts-archive">
                        @if(isset($artigos) and $artigos->count() >= 1)
                        @foreach($artigos as $artigo)
                            <article class="post">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4"> <a href="{{url('artigos/get/'.$artigo->id)}}"><img src="/imagens/artigo/{{$artigo->imagem}}" alt="" class="img-thumbnail"></a> </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="{{url('/')}}/artigos/get/{{artigo->id}}">{{$artigo->titulo}}</a></h3>
                                        <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i> {{date('d/m/Y' , strtotime($artigo->created_at))}} </span><span><i class="fa fa-user-circle"> {{$artigo->user->name}}</i></span>
                                            @foreach($artigo->departamentos as $dep)
                                                <span><i class="fa fa-info"></i> <small>{{$dep->departamento}}</small></span>
                                    </span>
                                        @endforeach
                                        <p>{!! substr($artigo->descricao  , 0 , 300)!!} ..</p>
                                        <p><a href="{{url('artigos/get/'.$artigo->id)}}" class="btn btn-primary">Continue Lendo <i class="fa fa-long-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <ul class="pagination">
                            {{$artigos->links()}}
                        </ul>
                        @else
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1"><h1>NÃO EXISTE NENHUM TÍTULO COM ESSE NOME</h1></div>
                        </div>
                        @endif
                    </div>
                    <!-- Start Sidebar -->
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
                                    <li><a href="{{url('/')}}/artigos/search/departamento/{{$dep->id}}">{{$dep->departamento}}</a><!--Quantidade de Posts--></li>
                                @endforeach
                            </ul>
                        </div>
                        {{--<div class="widget sidebar-widget">--}}
                            {{--<div class="sidebar-widget-title">--}}
                                {{--<h3>Post Tags</h3>--}}
                            {{--</div>--}}
                            {{--<div class="tag-cloud"> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> </div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection