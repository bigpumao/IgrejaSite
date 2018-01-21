<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@extends('frontend.template')
@section('content')
    <div class="nav-backed-header parallax" style="background-image:url(images/slide2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li class="active">Galeria de Álbuns</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    @foreach($albuns as $album)
                    <div class="col-md-4 col-sm-4">
                        <div class="grid-item staff-item">
                            <div class="grid-item-inner">
                                <div class="media-box"><a href="{{url('/')}}/galeria/get/{{$album->id}}"> <img class="img-thumbnail" src="/imagens/album/capa_album/{{$album->imagem_capa}}" alt=""> </a></div>
                                <div class="grid-content">
                                    <h3>{{$album->nome}}</h3>
                                    <nav>
                                        @foreach($album->departamentos as $dep)
                                        <li class="fa fa-info"></li> {{$dep->departamento}}
                                        @endforeach
                                    </nav>
                                    <p>{!! $album->descricao !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>