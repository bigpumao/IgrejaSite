@extends('dashboard.template')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6 animated fadeInDown">

            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$quantPost}}</h3>

                    <p>Artigos</p>
                </div>
                <div class="icon">
                    <i class="ion-compose"></i>
                </div>
                <a href="{{route('listagem')}}" class="small-box-footer">Veja os artigos que você escreveu <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6 animated fadeInDown">

            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$quantMembros}}<sup style="font-size: 20px"></sup></h3>

                    <p>Membros</p>
                </div>
                <div class="icon">
                    <i class="ion-android-contacts"></i>
                </div>
                <a href="{{route('membro.index')}}" class="small-box-footer">Quantidade de Membros <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @can('acl-permission' ,$acl)
            <div class="col-lg-3 col-xs-6 animated fadeInDown">

                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$quantUser}}</h3>

                        <p>Usuário</p>
                    </div>
                    <div class="icon">
                        <i class="ion-unlocked"></i>
                    </div>
                    <a href="{{route('user.index')}}" class="small-box-footer">Quantidade de Usuário <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
        <div class="col-lg-3 col-xs-6 animated fadeInDown">

            <div class="small-box bg-light-blue">
                <div class="inner">
                    <h3>{{$quantSlides}}</h3>

                    <p>Slids</p>
                </div>
                <div class="icon">
                    <i class="ion-refresh"></i>
                </div>
                <a href="{{route('slids.index')}}" class="small-box-footer">Quantidade de Slides <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInRight">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{$quantEventos}}</h3>

                    <p>Eventos</p>
                </div>
                <div class="icon">
                    <i class="ion-film-marker"></i>
                </div>
                <a href="{{route('eventos.index')}}" class="small-box-footer">Quantidade de Eventos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInRight">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{$quantAlbum}}</h3>

                    <p>Álbuns</p>
                </div>
                <div class="icon">
                    <i class="ion-images"></i>
                </div>
                <a href="{{route('album.index')}}" class="small-box-footer">Veja os Albuns <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInRight">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$quantYouTube}}</h3>

                    <p>You Tube</p>
                </div>
                <div class="icon">
                    <i class="ion-social-youtube"></i>
                </div>
                <a href="{{route('tube.index')}}" class="small-box-footer">Veja os Downloads <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInRight">
            <div class="small-box bg-light-blue-gradient">
                <div class="inner">
                    <h3>{{$quantSoundCloud}}</h3>

                    <p>Sound Cloud</p>
                </div>
                <div class="icon">
                    <i class="ion-headphone"></i>
                </div>
                <a href="{{route('sound.index')}}" class="small-box-footer">Veja os Sons <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInLeft">
            <div class="small-box bg-blue-active">
                <div class="inner">
                    <h3>{{$quantDownload}}</h3>

                    <p>Download</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-cloud-download"></i>
                </div>
                <a href="{{route('download.index')}}" class="small-box-footer">Veja os Downloads <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInLeft">
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{$quantOracao}}</h3>

                    <p>Pedido de Oração</p>
                </div>
                <div class="icon">
                    <i class="ion-chatbox-working"></i>
                </div>
                <a href="{{route('pedido.index')}}" class="small-box-footer">Veja as Orações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInLeft">
            <div class="small-box bg-lime">
                <div class="inner">
                    <h3>{{$quantContato}}</h3>

                    <p>Contato</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-email-outline"></i>
                </div>
                <a href="{{route('contatodash.index')}}" class="small-box-footer">Veja os Contatos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInLeft">
            <div class="small-box bg-maroon-gradient">
                <div class="inner">
                    <h3>{{$quantAvisos}}</h3>

                    <p>Quadro de Avisos</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-book-outline"></i>
                </div>
                <a href="{{route('contatodash.index')}}" class="small-box-footer">Veja os Avisos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6 animated fadeInUp">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h5> Visualize seus</h5>

                    <p>Gráficos</p>
                </div>
                <div class="icon">
                    <i class="ion-stats-bars"></i>
                </div>
                <a href="{{route('graficos.data')}}" class="small-box-footer">Veja os Gráficos <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>




@endsection