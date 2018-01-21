<div class="col-md-8 col-sm-6">
    <!-- Lista de Artigos  -->
    <div class="spacer-30"></div>
    <!-- Latest News -->
    <div class="listing post-listing">
        <div class="row">
            <div class="col-md-5">
                <header class="listing-header">
                    <h3>
                        <center>Artigos mais Visualizados</center>
                    </h3>
                </header>
            </div>
            {!! Form::open(array('url'    =>  'artigos/search/departamento' , 'method'  =>  'post')) !!}
            <div class="col-md-4">

                {!! Form::select('dep' , $departamento ,null, ['class'   =>  'form-control']) !!}

            </div>
            <div class="col-md-3">
                {!! Form::submit('buscar', ['class'  =>  'btn btn-default btn-md']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <section class="listing-cont">
            <ul>
                @foreach($ultimoArtigos as $artigo)
                    <li class="item post">
                        <div class="row">
                            <div class="col-md-4"><a href="{{url('/')}}/artigos/get/{{$artigo->id}}" class="media-box"> <img
                                            src="{{url('/')}}/imagens/artigo/{{$artigo->imagem}}" alt=""
                                            class="img-thumbnail"> </a></div>
                            <div class="col-md-8">
                                <div class="post-title">
                                    <h2><a href="{{url('/')}}/artigos/get/{{$artigo->id}}">{{$artigo->titulo}}</a></h2>
                                    <span class="meta-data"><i
                                                class="fa fa-calendar"></i>{{date('d/m/Y' , strtotime($artigo->created_at))}}</span>
                                </div>
                                <p>{!! substr($artigo->descricao , 0 , 200) !!} ...</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</div>