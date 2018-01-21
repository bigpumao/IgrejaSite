@if($albuns->count() >= 1 )
<div class="featured-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h4>Galeria de Imagens</h4>
                <a href="{{route('galeria.index')}}" class="btn btn-default btn-lg">Veja mais</a> </div>
            @foreach($albuns as $album)
                <div class="col-md-3 col-sm-3 post format-image">

                    <a href="{{url('/galeria/get/')}}/{{$album->id}}">
                        <img src="{{url('/')}}/imagens/album/capa_album/{{$album->imagem_capa}}" alt="">
                    </a>

                </div>
            @endforeach
        </div>
    </div>
</div>
@endif