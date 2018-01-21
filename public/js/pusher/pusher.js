// Enable pusher logging - don't include this in production
Pusher.logToConsole = false;

var pusher = new Pusher('a4a9cf032cdefd4b3ea8', {
    cluster: 'us2',
    encrypted: true
});

var channel = pusher.subscribe('notifica-artigo');
channel.bind('App\\Events\\NotificacaoArtigo', function (data) {
    var titulo = data.artigo.titulo
    $('.artigo').append('<strong>' + 'O ARTÍGO ' + '<b style="color: #000;">' +titulo + "</b>" + ' ACABA DE SER CRIADO' + '</strong>');

    $('#notificacaoArtigo').addClass('animated bounceInRight');
    $('#linkNotificacao').attr("href", "/artigos/get/"+data.artigo.id);
    $('#imgArtigo').append('<center><img src="/imagens/artigo/'+data.artigo.imagem + '"></center>');
    $('#notificacaoArtigo').show();


    setTimeout(function () {
        $('#notificacaoArtigo').addClass('');
        $('#notificacaoArtigo').addClass('animated bounceOutLeft');

    }, 15000);
    ;
    $('#notificacaoArtigo').removeClass("animated bounceOutLeft bounceInRight");
    setTimeout(function () {
        $('#imgArtigo').empty();
        $('.artigo').empty()
    }, 16000);
});
