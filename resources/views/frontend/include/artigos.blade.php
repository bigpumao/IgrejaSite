<div class="row">
    <div class="col-md-3  col-md-offset-5"><h3>Artigos</h3></div>
</div>
<div class="row">
    <!-- Start Featured Blocks -->
    @foreach($artigos as $artigo)
        <div class="col-md-6 col-sm-6  appear-animation bounceInRight appear-animation-visible" data-appear-animation="bounceInRight">
            <div class="grid-item staff-item">
                <div class="grid-item-inner">
                    <div class="media-box"><a href="{{url('/')}}/artigos/get/{{$artigo->id}}"><img src="/imagens/artigo/{{$artigo->imagem}}" alt=""></a> </div>

                    <div class="grid-content">
                        <h5><i class="fa fa-pencil-square-o"> {{$artigo->titulo}}</i></h5>

                        <nav class="social-icons"><i class="fa fa-user-circle-o"> Autor: {{$artigo->user->name}} </i> </nav>
                        <nav class="social-icons"> <i class="fa fa-calendar-plus-o"></i> {{date('d/m/Y' , strtotime($artigo->created_at))}}</nav>

                        <p>{!!substr($artigo->descricao , 0 , 200)!!} ..</p>
                    </div>
                    <a href="{{url('/')}}/artigos/get/{{$artigo->id}}" class="btn btn-default btn-md margin">Leia Mais</a>
                </div>
            </div>
        </div>
    @endforeach
<!-- End Featured Blocks -->
</div>