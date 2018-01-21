<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$titulo or 'Igreja de Deus em Luziânia Goias   '}}</title>
    <meta name="description" content="Igreja de Deus em Luziânia Goias">
    <meta name="keywords" content="IDB Igreja de Deus Igreja de Deus em Luziania">
    <meta name="author" content="Igreja de Deus no Brasil em Luziânia Goias">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
<!-- Mobile Specific Metas
          ================================================== -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
     ================================================== -->
    <link rel="shortcut icon" type="image/x-icon"
          href="http://idbocidental.com.br/site/wp-content/uploads/2012/03/logo.png">
    <link href="{{url('/')}}/frontend/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend/plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/css/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/plugins/lightbox2-master/dist/css/lightbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href={{url('/')}}/css/animate.css>

    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/frontend/css/ie8.css" media="screen"/><![endif]-->
    <!-- Color Style -->
    <link class="alt" href="{{url('/')}}/frontend/colors/color1.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/frontend/style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <!-- SCRIPTS
      ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    {{--<script src="js/responsiveslides.min.js"></script>--}}
    <script src="{{url('/')}}/frontend/js/modernizr.js"></script><!-- Modernizr -->
    <style>
        .margin {
            margin-top: 10px;
            margin-left: 5px;
            margin-bottom: 5px;
        }

        #logo {
            height: 63px;
        }

        .sondcloud {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        div > ul.youtube > iframe {
            width: 180px;
            height: 190px;
            margin-right: 20px;
        }

        /*
        Menu transparente
         */
        /*.navigation {
            height: 50px;
            background: rgba(255, 254, 248, 0.6);
            -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .4);
            -moz-box-shadow: 0 0 3px rgba(0, 0, 0, .4);
            box-shadow: 0 0 3px rgba(0, 0, 0, .4);
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
            z-index: 2;
            text-align: center;
            font-family: 'Roboto Condensed', sans-serif;
            position: absolute;
            top: 0;
        }*/
        #notificacaoArtigo {
            height: 500px;
            position: fixed;
            top: 20px;
            right: 300px;
            background-color: white;
            border-radius: 10px;;
            z-index: 2000;
        }

    </style>
</head>
<body>
<!--[if lt IE 7]>

<![endif]-->
<body>

<!--[if lt IE 7]>

<div class="body">
<!-- Start Site Header -->
@include('frontend.include.menu')
<!-- End Site Header -->
<!-- Start Hero Slider -->
@if(Request::route()->getName() == "front.index")
    @include('frontend.include.slids')
@endif
<div class="row">
    <div class="col-md-6 col-md-offset-3 alert alert-info" id="notificacaoArtigo" style="display: none;">
        <center><p class="artigo"></p></center>
        <a href="#" id="linkNotificacao">
            <div id="imgArtigo"></div>
        </a>
    </div>
</div>
<!-- End Hero Slider -->
<div class="row margin">
    @if(Session::has('success'))
        <div id="msg" class="col-md-4 col-md-offset-4">
            <div class="alert alert-success">{{Session::get('success')}}</div>
        </div>
    @endif
</div>


<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">

        @if(Request::route()->getName() != 'front.index')

            @yield('content')

        @else
            <div class="container">
                @include('frontend.include.artigos')

                <div class="row">
                @include('frontend.include.ultimos-artigos')
                <!-- ULTIMOS VIEOS EVENTOS -->
                    @include('frontend.include.ultimos-videos-eventos')
                </div>
            </div>
            <!-- Start Featured Gallery -->
            @include('frontend.include.galeria')
        <!-- Start Footer -->
            @include('frontend.include.soundcloud')
        @endif

    </div>
</div>
@include('frontend.include.footer')
<footer class="site-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="copyrights-col-left col-md-6 col-sm-6">
                <p>&copy; 2017 Todos os Direitos Reservados IDB
                    <small>Luziânia</small>
                </p>
            </div>
            <div class="copyrights-col-right col-md-6 col-sm-6">
                <div class="social-icons"><a href="https://www.facebook.com/" target="_blank"><i
                                class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i
                                class="fa fa-twitter"></i></a> <a href="http://www.pinterest.com/" target="_blank"><i
                                class="fa fa-pinterest"></i></a> <a href="https://plus.google.com/" target="_blank"><i
                                class="fa fa-google-plus"></i></a> <a href="http://www.pinterest.com/"
                                                                      target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://www.fb.com/natan.suporte" target="_blank"><i class="fa fa-linux"></i></a>
                    <small><- Developer</small>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

<script src="{{url('/')}}/frontend/plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="{{url('/')}}/frontend/js/helper-plugins.js"></script> <!-- Plugins -->
<script src="{{url('/')}}/frontend/js/bootstrap.js"></script> <!-- UI -->
<script src="{{url('/')}}/frontend/js/waypoints.js"></script> <!-- Waypoints -->
<script src="{{url('/')}}/frontend/plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements -->
<script src="{{url('/')}}/frontend/js/init.js"></script> <!-- All Scripts -->
<script src="{{url('/')}}/frontend/plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="{{url('/')}}/frontend/plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
<script src="{{url('/')}}/frontend/style-switcher/js/jquery_cookie.js"></script>
<script src="{{url('/')}}/frontend/style-switcher/js/script.js"></script>


<script src="{{url('/')}}/js/responsiveslides.min.js"></script>
{{--<script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{{--//Pusher Notification--}}

<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{url('/')}}/js/pusher/pusher.js"></script>
<script src="{{url('/')}}/js/jquery.popupoverlay.js"></script>
@include('frontend.scripts.fb.pagina-idbl-frontend')
@include('frontend.scripts.fb.comentarios-facebook')
@include('frontend.scripts.fb.script-do-butao-compartilhar')

<!-- Scripts de Plugins-->


<script>
    $(document).ready(function () {
        $(function () {
            $(".rslides").responsiveSlides();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#pedidoOracao").click(function () {
            $('#product_view').modal('show');
        });
    });
</script>
@if(Request::route()->getName() == 'front.index' and Session::has('errors'))
    <script>
        $(document).ready(function () {
            alert('Ops!! Alguns campos no seu formulário estão vazios. Vamos abrir novamente para que possamos corrigir. ');
            $('#myModal').modal('show');
        });
    </script>
@endif
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $('#msg').fadeOut(8000);
        }, 10000);
    });
</script>

<!-- Fim de Scripts de Plugins-->
<!-- Style Switcher Start -->

@if(Request::route()->getName() == 'front.index')
    @include('frontend.include.youtube')
@endif
@include('frontend.modal.pedidoOracao')
</body>
</html>