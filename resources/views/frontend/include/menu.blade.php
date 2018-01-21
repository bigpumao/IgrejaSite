<style>
    /*
    Notificações de novo Artigo
     */
    ul.dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 350px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 3px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;

    }
</style>
<header class="site-header">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-8">
                    <h1 class="logo"><a href="{{route('front.index')}}"><img id="logo" src="/imagens/logo/logo.png"
                                                                             alt="Logo"></a></h1>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-4">
                    <ul class="top-navigation hidden-sm hidden-xs">
                        <li><a href="{{route('eventos.celendario.index')}}">Veja nosso calendário de eventos</a></li>
                        <li><a href="{{route('login')}}" target="_blank">Login</a></li>
                    </ul>
                    <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navigation">
                        <ul class="sf-menu">
                            <li><a href="{{route('front.index')}}">Home</a></li>
                            <li><a href="#">Quem Somos</a>
                                <ul class="dropdown">
                                    <li><a href="">Visão Geral</a></li>
                                    <li><a href="{{route('contato.index')}}">Contato</a></li>
                                </ul>
                            </li>
                            <li class="megamenu"><a href="#">Mapa do Site </a>
                                <ul class="dropdown">
                                    <li>
                                        <div class="megamenu-container container">
                                            <div class="row">
                                                <div class="col-md-4 hidden-sm hidden-xs"><span
                                                            class="megamenu-sub-title"><i></i><center>História da Igreja de Deus</center></span>
                                                    <iframe width="640" height="360"
                                                            src="https://www.youtube.com/embed/TauvAvH87YI"
                                                            frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                <div class="col-md-4"><span class="megamenu-sub-title"><i></i>Departamentos</span>
                                                    <ul class="sub-menu">
                                                        <li><a href="">Jeans</a></li>
                                                        <li><a href="">Ministério de Louvor</a></li>
                                                        <li><a href="">Ministério de Senhores e Senhoras</a></li>
                                                        <li><a href="">Ministério Kids </a></li>
                                                        <li><a href="">Geral</a></li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-4"><span
                                                            class="megamenu-sub-title"><i></i> Outros</span>
                                                    <ul class="sub-menu">
                                                        <li><a href="">Contato</a></li>
                                                        <li><a href="">Download</a></li>

                                                        <li><a id="pedidoOracao" onclick="oracaoPedido()"
                                                               href="#pedidoOracao">Pedido de Oração</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{route('eventos.todos')}}">Eventos</a>

                            </li>
                            <li><a href="#">Vídeos & Sons</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('youtube.index')}}">Vídeos </a></li>
                                    <li><a href="{{route('soundcloud.index')}}">Sons </a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('galeria.index')}}">Galeria</a>

                            </li>
                            <li><a href="{{route('blog.index')}}">Blog</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
