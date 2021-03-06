<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$titulo or 'Área Administrativa'}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon"
          href="http://idbocidental.com.br/site/wp-content/uploads/2012/03/logo.png">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/')}}/template/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{url('/')}}/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('/')}}/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href={{url('/')}}/css/animate.css>
    <link rel="stylesheet" href={{url('/')}}/css/bootstrap-tour.min.css>
    <link href="{{url('/')}}/plugins/lightbox2-master/dist/css/lightbox.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{url('/')}}/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .unread {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">IDB<b>L</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>IDB</b>Luziânia</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                {{--<li class="dropdown notifications-menu">--}}
                {{--<a href="#" class="dropdown-toggle notificationCount" data-toggle="dropdown">--}}
                {{--<i class="fa fa-comment-o" data-toggle="modal" data-target="#myModal"></i>--}}
                {{--</a>--}}
                {{--</li>--}}
                <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="fa fa-envelope-o"></i>--}}
                {{--<span class="label label-success">4</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li class="header"Mensagem Direta</li>--}}
                {{--<li>--}}
                {{--<!-- inner menu: contains the actual data -->--}}
                {{--<ul class="menu">--}}
                {{--<li><!-- start message -->--}}
                {{--<a href="#">--}}
                {{--<div class="pull-left" id="imagem-remetente"></div>--}}
                {{--<h4>--}}
                {{--<h5 id="nome-remetente" class="pull-left"></h5>--}}
                {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                {{--</h4>--}}
                {{--<br/><br/>--}}
                {{--<p id="menssagem-remetente"></p>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<!-- end message -->--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="footer"><a href="#">Ver Todas as Messagens</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" id="sinoNotificacao" class="dropdown-toggle notificationCount"
                           data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            @if(count(auth()->user()->notifications) == '0')
                                <span></span>
                            @else
                                <span class="label label-warning"
                                      id="icone">{{count(auth()->user()->notifications)}}</span>
                            @endif

                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Ultimas Notificações de Contato</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @forelse(auth()->user()->notifications as $noti)
                                        <li>
                                            <a href="#" id="{{$noti->id}}" data-notif-id="{{$noti->data['endereco']}}"
                                               class="valor {{$noti->read_at == null ? 'unread' : ''}}">
                                                <p class="visualizado">{!! $noti->data['data'] !!}</p>
                                            </a>
                                            @empty
                                                <center>Não existe notificacão</center>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="footer"><a href="{{route('contatodash.index')}}">Visualizar Todos os Contatos</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">

                        <ul class="dropdown-menu">
                            <li class="header">Tem que implementar</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="perfil">
                            <img src="/uploads/avatars/{{$avatar->avatar}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{$avatar->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/uploads/avatars/{{$avatar->avatar}}" class="img-circle" alt="User Image">

                                <p>
                                    {{$avatar->name}}

                                </p>
                            </li>
                            <!--Sub menu do Perfil-->
                            <!-- Menu Body -->
                        {{--<li class="user-body">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Followers</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Sales</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a href="#">Friends</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.row -->--}}
                        {{--</li>--}}
                        <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('perfil')}}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    @include('dashboard.chat.lista-de-usuarios-chat')
    @include('dashboard.chat.index-modal')
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/uploads/avatars/{{$avatar->avatar}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{$avatar->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu Principal</li>
                <li><a href="{{route('dashboard')}}" id="home"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="{{route('listagem')}}" id="artigo"><i class="fa fa-pencil"></i><span class="label-name">Artigo</span></a>
                </li>
                <li><a href="{{route('membro.index')}}" id="membros"><i class="fa fa-folder-open-o"></i><span
                                class="label-name">Membros</span></a>
                </li>
                <li><a href="{{route('departamento.index')}}" id="departamento"><i class="fa fa-database"></i><span
                                class="label-name">Departamento</span></a>
                </li>
                <li><a href="{{route('slids.index')}}" id="slids"><i class="fa fa-refresh"></i><span
                                class="label-name">Slids</span></a></li>
                <li class="treeview"><a href="#" id="eventos"><i
                                class="fa fa-video-camera"></i><span>Eventos</span><span
                                class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('eventos.index')}}"><i class="fa fa-circle-o"></i> Textos</a></li>
                        <li><a href="{{route('video.index')}}"><i class="fa fa-circle-o"></i> Vídeos</a></li>
                    </ul>
                </li>
                <li><a href="{{route('album.index')}}" id="album"><i class="fa fa-camera"></i><span class="label-name">Album</span></a>
                </li>
                <li><a href="{{route('tube.index')}}" id="youtube"><i class="fa fa-youtube-play"></i><span
                                class="label-name">YouTube</span></a></li>
                <li><a href="{{route('sound.index')}}" id="sound"><i class="fa fa-soundcloud"></i><span
                                class="label-name">Sound Cloud</span></a>
                </li>
                <li><a href="{{route('aviso.index')}}" id="avisos"><i class="fa fa-book"></i><span class="label-name">Quadro de Avisos</span></a>
                </li>
                <li><a href="{{route('download.index')}}" id="download"><i class="fa fa-cloud-download"></i><span
                                class="label-name">Downloads</span></a>
                </li>
                <li><a href="{{route('pedido.index')}}" id="pedido"><i class="fa fa-comment-o"></i><span
                                class="label-name">Pedido de Oração</span></a>
                </li>
                <li><a href="{{route('contatodash.index')}}" id="contato"><i class="fa fa-envelope-open-o"></i><span
                                class="label-name">Contato</span></a></li>
                <li class="treeview"><a href="#" id="grafico"><i class="fa fa-bar-chart"></i><span>Gráficos</span><span
                                class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('graficos.user')}}"><i class="fa fa-circle-o"></i> Usuário</a></li>
                        <li><a href="{{route('graficos.all')}}"><i class="fa fa-circle-o"></i> Todos os Artigos</a></li>
                        <li><a href="{{route('graficos.data')}}"><i class="fa fa-circle-o"></i> Últimos 30 dias</a></li>
                        <li><a href="{{route('graficos.mes')}}"><i class="fa fa-circle-o"></i> Mês Atual</a></li>
                        <li><a href="{{route('graficos.ano')}}"><i class="fa fa-circle-o"></i> Ano</a></li>
                        <li><a href="{{route('graficos.area')}}"><i class="fa fa-circle-o"></i>Artigos e
                                visualização</a></li>
                        <li><a href="{{route('graficos.pizza')}}"><i class="fa fa-circle-o"></i> Pizza</a></li>
                        <li><a href="{{route('graficos.donut')}}"><i class="fa fa-circle-o"></i> Cubo</a></li>
                        <li><a href="{{route('graficos.bar')}}"><i class="fa fa-circle-o"></i> Torre</a></li>
                    </ul>
                </li>

                {{--ACL--}}
                @inject('acl' ,App\User)
                @can('acl-permission' , 'acl')
                    <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i><span
                                    class="label-name">Usuário</span></a></li>
                    <li><a href="{{route('acl.index')}}"><i class="fa fa-lock"></i><span
                                    class="label-name">ACL</span></a></li>
                @endcan
                {{--//Fim ACL--}}
                {{--Tour--}}
                <li><a id="play" href="#"><i class="fa fa-play-circle"></i><span class="label-name">Tutorial Básico</span></a>
                <li class="header">Rótulo</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Caixa de Email</span></a></li>
                {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Avisos</span></a></li>--}}
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Documentação</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>{{$info}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$info}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <section class="content">
                    @yield('content')
                </section>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <strong>
                <small>
                    <li class="fa fa-linux"><a href="https://www.fb.com/natan.suporte"> Natan Melo</a></li>
                </small>
            </strong>
            <b>Versão</b> 1.0
        </div>
        <strong>Copyright &copy; 2017 <a href="{{url('/')}}">IDB Luziânia</a>.</strong> Todos os Direitos
        Reservados

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Usuários online no momento</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Usuários online no momento</h4>

                                <p></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('/')}}/template/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/')}}/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{url('/')}}/template/bower_components/raphael/raphael.min.js"></script>
<script rsc="{{url('/')}}/template/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{url('/')}}/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{url('/')}}/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('/')}}/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('/')}}/template/bower_components/moment/min/moment.min.js"></script>
<script src="{{url('/')}}/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{url('/')}}/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('/')}}/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{url('/')}}/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('/')}}/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/template/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script src="{{url('/')}}/plugins/lightbox2-master/dist/js/lightbox.js"></script>
{{--//pubhser--}}
{{--<script src="https://js.pusher.com/4.1/pusher.min.js"></script>--}}
<script src="{{url('/js/cep.js')}}/"></script>
<script src="{{url('/js/bootstrap-tour.min.js')}}/"></script>
<script src="{{url('/js/tour.js')}}/"></script>

<script>
    $(document).ready(function () {
        $('#play').on('click', function () {
            //alert('asdf');
            tour.restart();
            tour.start(true);
        });
    });


</script>
<script>
    $(document).ready(function () {

        $('.valor').click(function () {
            var valor = $(this).attr('id');
            var href = '/administrativo/contatodash/show/';
            var endereco = $(this).attr('data-notif-id');
            var union = href + endereco;

            $.ajax({
                type: 'GET',
                url: '/administrativo/contatodash/visualizado/' + valor,
                dataType: 'json',
            }).done(function (e) {
                if (e) {
                    e ? (window.location.href = union) : false;
                } else {
                    console.log('error');
                }


            });
        });
    });

</script>


<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('editor1', options);
</script>

<!-- Fim dos Scripts -->

<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: "pt-BR"
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $('#msg').addClass('');
            $('#msg').addClass('alert alert-success animated bounceOutRight');
        }, 6000);
    });
</script>
</body>
</html>
