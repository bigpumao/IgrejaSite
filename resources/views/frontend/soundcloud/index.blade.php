@extends('frontend.template')
@section('content')
    <style>
        .timeline-badge {
            background-color: rgba(0, 0, 0, 0.04) !important;
        }

    </style>
    <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('front.index')}}">Home</a></li>
                        <li class="active">Sond Cloud IDBL</li>
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
                <div class="col-md-5">
                    <h1>Sound Cloud IDBL</h1>
                </div>
                {!! Form::open(array('route'    =>  'soundcloud.get','method'    =>  'POST')) !!}
                <div class="col-md-6">
                    <div class="widget sidebar-widget search-form-widget">

                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Procurar sons pelo título">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i
                                        class="fa fa-search fa-lg"></i></button></span>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content timeline-inverted -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <ul class="timeline">
                    @foreach($soundcloud as $sound)
                        <li>
                        @if($sound->id % 2 == 1)
                        @else
                            <li class="timeline-inverted">
                                @endif
                                <div class="timeline-badge"><img src="/imagens/logo/logo.png" width="100;"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title"><a
                                                    href="single-event.html">{{$sound->titulo}}</a></h3>
                                    </div>
                                    <div class="timeline-body">
                                        <ul class="info-table">
                                            {!! $sound->frame !!}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{$soundcloud->links()}}
        </div>
    </div>
@endsection