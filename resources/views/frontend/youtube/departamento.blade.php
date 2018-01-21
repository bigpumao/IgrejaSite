@extends('frontend.template')
@section('content')
    <style>
        .marginTube{
            margin-top: 50px;
        }
    </style>
    <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Vídeos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Nav Backed Header -->
    <!-- Start Page Header -->

    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 posts-archive">
                        <div class="post">
                            @if(isset($youtube) and $youtube->count() >= 1)
                            @foreach($youtube as $tube)
                                <div class="row marginTube">
                                    <div class="col-md-12 col-sm-12">
                                        {!! $tube->frame !!}
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <h1><center>AINDA NÃO FOI ADCIONADO NENHUM VÍDEO NESSE DEPARTAMENTO</center></h1>
                            @endif
                        </div>


                        <ul class="pagination">
                            {{$youtube->links()}}
                        </ul>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        <div class="widget sidebar-widget search-form-widget">
                            {!! Form::open(array('route'    =>  'youtube.get',  'method'    =>  'POST')) !!}
                            <div class="input-group input-group-lg">
                                <input type="text" name="search" class="form-control" placeholder="Procurar um Vídeo">
                                <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"></i></button></span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="widget sidebar-widget">
                            <div class="sidebar-widget-title">
                                <h3>Vídeo por Departamento</h3>
                            </div>
                            <ul>
                                @foreach($departamento as $dep)
                                    <li><a href="{{url('/')}}/videos/search/departamento/{{$dep->id}}">{{$dep->departamento}}</a><!--Quantidade de Posts--></li>
                                @endforeach
                            </ul>
                        </div>
                        {{--<div class="widget sidebar-widget">--}}
                            {{--<div class="sidebar-widget-title">--}}
                                {{--<h3>Post Tags</h3>--}}
                            {{--</div>--}}
                            {{--<div class="tag-cloud"> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> </div>--}}
                        {{--</div>--}}
                    </div><!--Fim do SideBar-->
                </div>
            </div>

        </div>
    </div>
@endsection