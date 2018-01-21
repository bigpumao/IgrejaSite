<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<meta charset="UTF-8">
<div class="row">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <img class="img-responsive" src="{{ $message->embed(url('/') . '/imagens/logo/logo.png')}}" alt="" width="300" height="100">
        </div>
    </div>
    <div class="col-md-12">
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-5 col-md-offset-3">
                <p>Prezado(a) {{$contato->nome}}, queremos agradecer seu contato, sua participação foi muito importante para nós.
                    Aproveitamos para reforçar nosso compromisso e lhe atender logo em breve.
                    Obrigado.
                    <br>
                    <a href="{{url('/')}}">Igreja de Deus no Brasil em Luziânia </a> Ainda há lugar.
                </p>
            </div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-2 col-md-offset-3">
                <h3>Artigos Mais visualizados</h3>
            </div>
        </div>
        @foreach($artigos as $artigo)
            <div class="row" style="margin-top: 40px;">
                <div class="col-md-2 col-md-offset-3">
                    <ul class=""><a href="{{url('/')}}/artigos/get/{{$artigo->id}}"
                                    class="media-box post-image"><i class="fa fa-angle-right"></i> <img
                                    src="{{ $message->embed(url('/') . '/imagens/artigo/' . $artigo->imagem)}}" alt="" class="img-responsive"
                                    width="591" height="264"> </a>
                    </ul>
                </div>
                <div class="widget-blog-content"><a
                            href="{{url('/')}}/artigos/get/{{$artigo->id}}">{{$artigo->titulo}}</a></div>
                <div class="row">
                    <div class="col-md-3">
                        <article>
                            <p>{!! substr($artigo->descricao , 0 ,250) !!} ..</p>
                        </article>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>