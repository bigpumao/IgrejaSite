<footer class="site-footer">
    <div class="container">
        <div class="row">
            <!-- Start Footer Widgets -->
            <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Pedido de Oração</h4>
                <img src="/imagens/oracao/oracao.jpg" alt="Logo">
                <div class="spacer-20"></div>
                <center><small>Tiago 5:16</small></center>
                <p>Confessai as vossas culpas uns aos outros, e orai uns pelos outros, para que sareis. A oração feita por um justo pode muito em seus efeitos.</p>
                <button id="pedidoOracao" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-md">Pedido de Oração</button>
            </div>
            <div class="col-md-4 col-sm-4 widget footer-widget">
                <h4 class="footer-widget-title">Outras Igrejas</h4>
                <ul>
                    <li><a href="https://www.mcgi.org/pt/welcome/" target="_blank">Igreja de Deus Internacional</a></li>
                    <li><a href="http://igrejadedeus.org.br" target="_blank">Igreja de Deus Nacional</a></li>
                    <li><a href="http://idbocidental.com.br" target="_blank">Igreja de Deus Distrital</a></li>
                    <li><a href="http://www.igrejadedeusguara.com.br" target="_blank">Igreja de Deus no Guara DF</a></li>
                </ul>
                <div class="row" style="margin-top: 100px;">
                    <div class="row">
                        <label for="">Entre em Contato Conosco</label>
                    </div>
                    <a href="{{route('contato.index')}}" class="btn btn-default btn-md" >Contato</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 widget footer-widget">

                @if(isset($aniversario) && $aniversario->count() > 0)
                    <h4 class="footer-widget-title">Aniversariante do Dia</h4>
                    <ul class="rslides">
                        @foreach($aniversario as $aniver)
                            <li>
                                <img src="/imagens/membros/{{$aniver->imagem}}" alt="" width="300" height="400">
                                <div>
                                    <center><h5>{{$aniver->nome}}</h5></center>
                                </div>
                            </li>
                        @endforeach
                            <img src="/imagens/aniversario/aniversario.jpg" alt="" width="300" height="400">
                        <li>

                    </ul>

                @else
                    <h4 class="footer-widget-title">Redes Sociais</h4>

                    <div>
                        <div class="fb-page" data-href="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/" data-tabs="timeline" data-width="300" data-height="380" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/Igreja-de-Deus-em-Luzi&#xe2;nia-Goias-1930365473898071/">Igreja de Deus em Luziânia Goias</a>
                            </blockquote>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>
