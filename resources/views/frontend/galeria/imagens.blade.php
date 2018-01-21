<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@extends('frontend.template')
@section('content')
    <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li><a href="{{route('galeria.index')}}">Galeria</a></li>
                        <li class="active">Imagens do Álbum</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <ul class="isotope-grid" data-sort-id="gallery">
                        @foreach($imagens as $imagem)
                        <li class="col-md-3 col-sm-3 grid-item post format-image">
                            <div class="grid-item-inner">
                                <a href="/imagens/album/imagens/{{$imagem->imagem}}" data-lightbox="image-1"  data-title="{{$imagem->descricao}}" class="media-box">
                                    <img style="border-radius: 10px;" class="img-responsive" src="/imagens/album/imagens/{{$imagem->imagem}}"  alt="">
                                </a>
                            </div>
                        </li>
                         @endforeach
                    </ul>
                </div>
                <div class="text-align-center">
                    {{$imagens->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>