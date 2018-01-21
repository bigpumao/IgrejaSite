<div class="col-md-4 col-sm-6">
    @if(isset($video))
    <div class="listing sermons-listing">
        <header class="listing-header">
            <h3>Últimos Vídeos</h3>
        </header>
        <section class="listing-cont">
            <ul>
                <h4><a href="#">{{$video->titulo}}</a></h4>
                <div class="featured-sermon-video">
                    {!! $video->frame !!}
                </div>
                <p>{!! substr($video->descricao , 0 , 150) !!} ...</p>
                </li>
                <hr/>
                <h2 class="sermon-title"><a href="single-sermon.html">Quadro de Avisos: </a></h2>
                <div class="accordion" id="toggleArea">
                    @foreach($avisos as $aviso)
                        <div class="accordion-group panel">
                            <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapse{{$aviso->id}}"> {{$aviso->semana}} <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                            <div id="collapse{{$aviso->id}}" class="accordion-body collapse">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{$aviso->titulo}}
                                    </div>
                                </div>
                                <div class="accordion-inner">
                                    {!! $aviso->descricao !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </ul>
        </section>
    </div>
    @else
    <div class="listing sermons-listing">
        <header class="listing-header">
            <h3>História da Igreja de Deus</h3>
        </header>
        <section class="listing-cont">
            <ul>
                <h4><center>Um breve vídeo sobre a história da Igreja de Deus</center></h4>
                <div class="featured-sermon-video">
                    <iframe width="640" height="360" src="https://www.youtube.com/embed/TauvAvH87YI" frameborder="0" allowfullscreen></iframe>
                </div>
                <p>
                    <?php
                    $fundado = 1886;
                    $anoAtual = date('Y');
                    $result = ($anoAtual - $fundado);
                    ?>
                    Este vídeo conta a história da Igreja de Deus (Church of God), fundada em <?php echo $fundado; ?>, com sede em Cleveland, Tennesse, Estados Unidos. A trajetória de uma das maiores igrejas pentecostais do mundo, que fez seu <?php echo $result; ?>º aniversário, no último dia 19 de agosto de <?php echo $anoAtual ?>. Vale apena assistir esta história vibrante de uma denominação que nasceu de um avivamento na região montanhosa da Carolina do Norte - USA.
                </p>
                </li>
                <hr/>
                <h2 class="sermon-title"><a href="single-sermon.html">Quadro de Avisos: </a></h2>
                <div class="accordion" id="toggleArea">
                    @foreach($avisos as $aviso)
                        <div class="accordion-group panel">
                            <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapse{{$aviso->id}}"> {{$aviso->semana}} <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                            <div id="collapse{{$aviso->id}}" class="accordion-body collapse">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{$aviso->titulo}}
                                    </div>
                                </div>
                                <div class="accordion-inner">
                                    {!! $aviso->descricao !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </ul>
        </section>
    </div>
    @endif
</div>