<div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
    <ul class="slides">
        @if(isset($eventos) and $eventos->count() >=1)
            @foreach($eventos as $expirar)
                <li class=" parallax" style="background-image:url(imagens/eventos/{{$expirar->imagem}});"></li>
            @endforeach
            @foreach($slids as $slide)
                <li class=" parallax" style="background-image:url(imagens/slids/{{$slide->imagem}});"></li>
            @endforeach
        @else
            @foreach($slids as $slide)
                <li class=" parallax" style="background-image:url(imagens/slids/{{$slide->imagem}});"></li>
            @endforeach
        @endif
    </ul>
</div>