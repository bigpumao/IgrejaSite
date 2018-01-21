@extends('frontend.template')
@section('content')
    <style>
        #altura{
            width:800px;
            height: 400px;
        }
    </style>

        @php
            switch ($imagem->departamento){
                case 'Rede de Kids':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/rede-kids.jpg);">
                @php break;
                 case 'Rede de Mulheres':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/rede-mulheres.jpg);">
                 @php break;
                 case 'Rede de Jeans':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 case 'Rede de Teens':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 case 'Rede de Células':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 case 'Treinamento de Líderes de Células (TLC)':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 case 'Escola Bíblica de Dominical (EBD)':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 case 'Geral':@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;
                 default:@endphp
                 <div class="nav-backed-header parallax" style="background-image:url({{url('/')}}/imagens/imagens-header/artigo.jpg);">
                 @php break;

          }
        @endphp

    {{--<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">--}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li class="active">Departamento</li>
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
                <div class="col-md-7">
                    @foreach($departamento as $dep)
                    <h1>{{$dep->departamento}}</h1>
                    @endforeach
                </div>

                {!! Form::open(array('url'  =>  'artigos/search/departamento/')) !!}
                <div class="col-md-3">
                   {!! Form::select('dep' , $searchdep , null , ['class'    =>  'form-control', 'placeholder'  =>  'Escolha uma Opção']) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Procurar' , ['class' =>  'btn btn-default btn-md']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 posts-archive blog-full-width">
                        @if(isset($departamento) and $departamento->count() >= 1)
                        @foreach($departamento as $artigo)

                        <article class="post">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i>{{date('d/m/Y' , strtotime($artigo->created_at))}} </span><span><i class="fa fa-user-circle-o"></i>{{$artigo->user->name}}</span><span></span></span>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <h3><a href="{{url('/')}}/artigos/get/{{$artigo->id}}"></a></h3>
                                    <a href="{{url('/')}}/artigos/get/{{$artigo->id}}"><img src="/imagens/artigo/{{$artigo->imagem}}" alt="" class="img-thumbnail" id="altura"></a>
                                    <p> {!! substr($artigo->descricao , 0 , 300)!!} ..</p>
                                    <p><a href="{{url('/')}}/artigos/get/{{$artigo->id}}" class="btn btn-primary">Continue Lendo<i class="fa fa-long-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </article>

                         @endforeach
                        @else
                         <h1><center>NÃO EXISTE AINDA NENHUM ARTIGO PARA ESSE DEPARTAMENTO</center></h1>
                         @endif
                        <ul class="pagination">
                            {{$departamento->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection