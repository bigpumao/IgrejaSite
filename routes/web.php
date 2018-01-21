<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
$this->get('dashboard/dashboard', function () {
    return redirect('administrativo/dashboard');
});
//Grupo AUTH
$this->group(array('prefix' => 'administrativo', 'middleware' => 'auth'), function () {

    /*
     * Menu Princial
     */

    $this->get('dashboard', 'dashboard\PostagemController@manu_principal')->name('dashboard');

    /*
     * Departamento
     */
    $this->group(array('prefix' => 'departamento'), function () {
        $this->get('index', array('as' => 'departamento.index', 'uses' => 'dashboard\Departamento\DepartamentoController@index'));
        $this->get('datatables', array('as' => 'departamento.datatables', 'uses' => 'dashboard\Departamento\DepartamentoController@get_datatable'));
        $this->get('creaate', array('as' => 'departamento.create', 'uses' => 'dashboard\Departamento\DepartamentoController@create'));
        $this->post('store', array('as' => 'departamento.store', 'uses' => 'dashboard\Departamento\DepartamentoController@store'));
        $this->get('edit/{id}', array('as' => 'departamento.edit', 'uses' => 'dashboard\Departamento\DepartamentoController@edit'));
        $this->post('update/{id}', array('as' => 'departamento.update', 'uses' => 'dashboard\Departamento\DepartamentoController@update'));
        $this->get('destroy/{id}', array('as' => 'departamento.destroy', 'uses' => 'dashboard\Departamento\DepartamentoController@destroy'));
    });
    /*
     * Contato do Usuario do Sistem
     */
    $this->group(array('prefix' => 'contato-de-usuario'), function () {
        $this->post('store', array('as' => 'usercontato.store', 'uses' => 'dashboard\UserContato\UserContatoController@store'));
    });
    /*
     * Slides Show
     */
    $this->group(array('prefix' => 'slids'), function () {
        $this->get('index', array('as' => 'slids.index', 'uses' => 'dashboard\Slids\SlidsController@index'));
        $this->get('datatables', array('as' => 'slids.datatables', 'uses' => 'dashboard\Slids\SlidsController@get_datatable'));
        $this->get('create', array('as' => 'slids.create', 'uses' => 'dashboard\Slids\SlidsController@create'));
        $this->post('store', array('as' => 'slids.store', 'uses' => 'dashboard\Slids\SlidsController@store'));
        $this->get('edit/{id}', array('as' => 'slids.edit', 'uses' => 'dashboard\Slids\SlidsController@edit'));
        $this->post('update/{id}', array('as' => 'slids.update', 'uses' => 'dashboard\Slids\SlidsController@update'));
        $this->get('destroy/{id}', array('as' => 'slids.destroy', 'uses' => 'dashboard\Slids\SlidsController@destroy'));
    });
    /*
     * Quadro de Avisos
     */
    $this->group(array('prefix' => 'avisos'), function () {
        $this->get('', array('as' => 'aviso.index', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@index'));
        $this->get('datatables', array('as' => 'aviso.datatables', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@get_datatable'));
        $this->get('create', array('as' => 'aviso.create', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@create'));
        $this->post('store', array('as' => 'aviso.store', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@store'));
        $this->get('edit/{id}', array('as' => 'aviso.edit', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@edit'));
        $this->post('update/{id}', array('as' => 'aviso.update', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@update'));
        $this->get('destroy/{id}', array('as' => 'aviso.destroy', 'uses' => 'dashboard\QuadroAvisos\QuadroAvisosController@destroy'));
    });
    /*
     * ACL
     */
    $this->group(array('prefix' => 'acl'), function () {
        $this->get('index', array('as' => 'acl.index', 'uses' => 'dashboard\Acl\AclController@index'));
        $this->get('edit/{id}', array('as' => 'acl.edit', 'uses' => 'dashboard\Acl\AclController@edit'));
        $this->post('store/{id}', array('as' => 'acl.update', 'uses' => 'dashboard\Acl\AclController@update'));
        $this->get('datatables', array('as' => 'acl.datatables', 'uses' => 'dashboard\Acl\AclController@get_datatable'));
    });
    /*
     * Biograria
     */
    $this->group(array('prefix' => 'biografia'), function () {
        $this->post('update/{id}', array('as' => 'bio.update', 'uses' => 'dashboard\Biografia\BiografiaController@update'));
    });
    /*
     * Soud Cloud
     */

    $this->group(array('prefix' => 'soudcloud'), function () {
        $this->get('index', array('as' => 'sound.index', 'uses' => 'dashboard\SoudCloud\SoudCloudController@index'));
        $this->get('datatables', array('as' => 'sound.datatables', 'uses' => 'dashboard\SoudCloud\SoudCloudController@get_datatable'));
        $this->get('create', array('as' => 'sound.create', 'uses' => 'dashboard\SoudCloud\SoudCloudController@create'));
        $this->post('store', array('as' => 'sound.store', 'uses' => 'dashboard\SoudCloud\SoudCloudController@store'));
        $this->get('edit/{id}', array('as' => 'sound.edit', 'uses' => 'dashboard\SoudCloud\SoudCloudController@edit'));
        $this->post('update/{id}', array('as' => 'sound.update', 'uses' => 'dashboard\SoudCloud\SoudCloudController@update'));
        $this->get('destroy/{id}', array('as' => 'sound.destroy', 'uses' => 'dashboard\SoudCloud\SoudCloudController@destroy'));
    });

    /*
     * Youtube Viídeos
     */


    $this->group(array('prefix' => 'idbtube'), function () {
        $this->get('index', array('as' => 'tube.index', 'uses' => 'dashboard\YouTube\YouTubeController@index'));
        $this->get('datatables', array('as' => 'tube.datatables', 'uses' => 'dashboard\YouTube\YouTubeController@get_datatable'));
        $this->get('create', array('as' => 'tube.create', 'uses' => 'dashboard\YouTube\YouTubeController@create'));
        $this->post('store', array('as' => 'tube.store', 'uses' => 'dashboard\YouTube\YouTubeController@store'));
        $this->get('edit/{id}', array('as' => 'tube.edit', 'uses' => 'dashboard\YouTube\YouTubeController@edit'));
        $this->post('update/{id}', array('as' => 'tube.update', 'uses' => 'dashboard\YouTube\YouTubeController@update'));
        $this->get('destroy/{id}', array('as' => 'tube.destroy', 'uses' => 'dashboard\YouTube\YouTubeController@destroy'));
    });
    /*
     * Gráficos
     */
    $this->group(array('prefix' => 'graficos'), function () {
        $this->get('dias', array('as' => 'graficos.data', 'uses' => 'dashboard\Grafico\ChartsController@trintaDias'));
        $this->get('area', array('as' => 'graficos.area', 'uses' => 'dashboard\Grafico\ChartsController@area'));
        $this->get('pizza', array('as' => 'graficos.pizza', 'uses' => 'dashboard\Grafico\ChartsController@pizza'));
        $this->get('donut', array('as' => 'graficos.donut', 'uses' => 'dashboard\Grafico\ChartsController@donut'));
        $this->get('mes', array('as' => 'graficos.mes', 'uses' => 'dashboard\Grafico\ChartsController@mes'));
        $this->get('ano', array('as' => 'graficos.ano', 'uses' => 'dashboard\Grafico\ChartsController@ano'));
        $this->get('torre', array('as' => 'graficos.bar', 'uses' => 'dashboard\Grafico\ChartsController@torre'));
        $this->get('user', array('as' => 'graficos.user', 'uses' => 'dashboard\Grafico\ChartsController@user'));
        $this->get('todos-artigos', array('as' => 'graficos.all', 'uses' => 'dashboard\Grafico\ChartsController@artigoAll'));
    });
    /*
     * Artigos
     */

    $this->group(array('prefix' => 'postagem'), function () {
        $this->get('index', array('as' => 'listagem', 'uses' => 'dashboard\PostagemController@index'));
        $this->get('create', array('as' => 'create', 'uses' => 'dashboard\PostagemController@create'));
        $this->post('store', array('as' => 'store', 'uses' => 'dashboard\PostagemController@store'));
        $this->get('show/{id}', array('as' => 'show', 'uses' => 'dashboard\PostagemController@show'));
        $this->get('edit/{id}', array('as' => 'edit', 'uses' => 'dashboard\PostagemController@edit'));
        $this->get('destroy/{id}', array('as' => 'destroy', 'uses' => 'dashboard\PostagemController@destroy'));
        $this->post('update/{id}', array('as' => 'update', 'uses' => 'dashboard\PostagemController@update'));
        $this->get('datatables', array('as' => 'datatables', 'uses' => 'dashboard\PostagemController@get_datatable'));
    });
    /*
     * Cadastro de membro da igreja
     */

    $this->group(array('prefix' => 'membros', 'middleware' => 'auth'), function () {
        $this->get('index', array('as' => 'membro.index', 'uses' => 'dashboard\CadastroMController@index'));
        $this->get('create', array('as' => 'membro.create', 'uses' => 'dashboard\CadastroMController@create'));
        $this->post('store', array('as' => 'membro.store', 'uses' => 'dashboard\CadastroMController@store'));
        $this->get('show/{id}', array('as' => 'show.edit', 'uses' => 'dashboard\CadastroMController@show'));
        $this->get('edit/{id}', array('as' => 'membro.edit', 'uses' => 'dashboard\CadastroMController@edit'));
        $this->get('datatables', array('as' => 'membro.datatables', 'uses' => 'dashboard\CadastroMController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'membro.destroy', 'uses' => 'dashboard\CadastroMController@destroy'));
        $this->post('update/{id}', array('as' => 'membro.update', 'uses' => 'dashboard\CadastroMController@update'));
    });

    /*
     * Perfil do usuário
     */
    $this->group(array('prefix' => 'perfil'), function () {
        $this->get('profile', array('as' => 'perfil', 'uses' => 'dashboard\PerfilController@profile'));
        $this->get('update', function () {
            if (empty(Request::all())) {
                return redirect()->route('perfil')->with('info', 'Por Genteileza, tente cadastrar sua biografia outra vez. Problema ao gravar no banco de dados');
            }
        });
        $this->post('update', array('as' => 'update.imagem', 'uses' => 'dashboard\PerfilController@update_avatar'));
        $this->post('users/{id}', array('as' => 'perfil.update-user', 'uses' => 'dashboard\PerfilController@update_perfil'));
    });
    /*
     * Album de foto
     */
    $this->group(array('prefix' => 'album'), function () {
        $this->get('index', array('as' => 'album.index', 'uses' => 'dashboard\Album\AlbumController@index'));
        $this->get('create', array('as' => 'album.create', 'uses' => 'dashboard\Album\AlbumController@create'));
        $this->post('store', array('as' => 'album.store', 'uses' => 'dashboard\Album\AlbumController@store'));
        $this->get('imagem-edit/{id}', array('as' => 'imagem.album.edit', 'uses' => 'dashboard\Album\AlbumController@edit'));
        $this->get('destroy/{id}', array('as' => 'album.destroy', 'uses' => 'dashboard\Album\AlbumController@destroy'));
        $this->post('album-update/{id}', array('as' => 'album.update', 'uses' => 'dashboard\Album\AlbumController@update'));
        /*
         * Imagens do albums
         */

        $this->get('quantImagem', array('as' => 'quantImagem', 'uses' => 'dashboard\Album\ImagemController@quantImagem'));
        $this->get('imagem-create/{id}', array('as' => 'imagem.album.create', 'uses' => 'dashboard\Album\ImagemController@create'));
        $this->post('imagem-store/{id}', array('as' => 'imagem.album.store', 'uses' => 'dashboard\Album\ImagemController@store'));
        $this->get('imagem-view/{id}', array('as' => 'imagem.album.view', 'uses' => 'dashboard\Album\ImagemController@view'));
        $this->get('imagem-destroy/{id}', array('as' => 'iagem.album.destroy', 'uses' => 'dashboard\Album\ImagemController@destroy'));
    });
    /*
     * Eventos da igreja com slides e texto
     */
    $this->group(['prefix' => 'eventos'], function () {
        $this->get('index', array('as' => 'eventos.index', 'uses' => 'dashboard\Eventos\EventosController@index'));
        $this->get('create', array('as' => 'eventos.create', 'uses' => 'dashboard\Eventos\EventosController@create'));
        $this->post('store', array('as' => 'eventos.store', 'uses' => 'dashboard\Eventos\EventosController@store'));
        $this->get('datatables', array('as' => 'eventos.datatables', 'uses' => 'dashboard\Eventos\EventosController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'eventos.destroy', 'uses' => 'dashboard\Eventos\EventosController@destroy'));
        $this->get('edit/{id}', array('as' => 'eventos.edit', 'uses' => 'dashboard\Eventos\EventosController@edit'));
        $this->post('update/{id}', array('as' => 'eventos.update', 'uses' => 'dashboard\Eventos\EventosController@update'));
    });
    /*
     * Eventos em Vídeos
     */
    $this->group(['prefix' => 'video'], function () {
        $this->get('index', array('as' => 'video.index', 'uses' => 'dashboard\Eventos\EventosVideoController@index'));
        $this->get('create', array('as' => 'video.create', 'uses' => 'dashboard\Eventos\EventosVideoController@create'));
        $this->post('store', array('as' => 'video.store', 'uses' => 'dashboard\Eventos\EventosVideoController@store'));
        $this->get('datatables', array('as' => 'video.datatables', 'uses' => 'dashboard\Eventos\EventosVideoController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'video.destroy', 'uses' => 'dashboard\Eventos\EventosVideoController@destroy'));
        $this->get('edit/{id}', array('as' => 'video.edit', 'uses' => 'dashboard\Eventos\EventosVideoController@edit'));
        $this->post('update/{id}', array('as' => 'video.update', 'uses' => 'dashboard\Eventos\EventosVideoController@update'));
    });
    /*
     * Download de arqvuivos
     */

    $this->group(array('prefix' => 'downloads'), function () {
        $this->get('index', array('as' => 'download.index', 'uses' => 'dashboard\Download\DownloadController@index'));
        $this->post('store', array('as' => 'download.store', 'uses' => 'dashboard\Download\DownloadController@store'));
        $this->get('datatables', array('as' => 'download.datatables', 'uses' => 'dashboard\Download\DownloadController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'download.destroy', 'uses' => 'dashboard\Download\DownloadController@destroy'));
        $this->get('destroy/{id}', array('as' => 'download.destroy', 'uses' => 'dashboard\Download\DownloadController@destroy'));
        $this->get('link-donwload/{id}', array('as' => 'download.link', 'uses' => 'dashboard\Download\DownloadController@pegalink'));
    });
    /*
     * Registro dos Usuarios
     */

    $this->group(array('prefix' => 'usuario'), function () {
        $this->get('index', array('as' => 'user.index', 'uses' => 'dashboard\Usuario\UsuarioController@index'));
        $this->get('/create', array('as' => 'user.create', 'uses' => 'dashboard\Usuario\UsuarioController@create'));
        $this->post('/store', array('as' => 'user.store', 'uses' => 'dashboard\Usuario\UsuarioController@store'));
        $this->get('datatables', array('as' => 'user.datatables', 'uses' => 'dashboard\Usuario\UsuarioController@get_datatable'));
        $this->get('edit/{id}', array('as' => 'user.edit', 'uses' => 'dashboard\Usuario\UsuarioController@edit'));
        $this->post('update/{id}', array('as' => 'user.update', 'uses' => 'dashboard\Usuario\UsuarioController@update'));
        $this->get('destroy/{id}', array('as' => 'user.destroy', 'uses' => 'dashboard\Usuario\UsuarioController@destroy'));
    });
    /*
     * Pedido de oração
     *
     */
    $this->group(array('prefix' => 'pedido'), function () {
        $this->get('todas-oracoes', array('as' => 'pedido.index', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@index'));
        $this->get('datatables', array('as' => 'pedido.datatables', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@get_datatable'));
        $this->get('destroy/{id}', array('as' => 'pedido.destroy', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@destroy'));
        $this->get('show/{id}', array('as' => 'pedido.destroy', 'uses' => 'dashboard\PedidoOracao\PedidoOracaoController@show'));
    });
    /*
     * Contato
     */
    $this->group(array('prefix' => 'contatodash'), function () {
        $this->get('index', array('as' => 'contatodash.index', 'uses' => 'dashboard\Contato\ContatoController@index'));
        $this->get('datatables', array('as' => 'contatodash.datatable', 'uses' => 'dashboard\Contato\ContatoController@get_datatable'));
        $this->get('show/{id}', array('as' => 'contatodash.show', 'uses' => 'dashboard\Contato\ContatoController@show'));
        $this->get('destroy/{id}', array('as' => 'contatodash.destroy', 'uses' => 'dashboard\Contato\ContatoController@destroy'));
        $this->get('visualizado/{id}', array('as' =>  'visualizado' , 'uses'  => 'dashboard\Contato\ContatoController@visualizado'));
    });

}); // <- fim do grupo de rotas do dashboard
#-------------------------------------------------------------Redirecionamento de rotas---------------------------------------------------------------------------------------
//redireciona home para o dashboard
$this->get('/home', function () {
    return Redirect::to('administrativo/dashboard');
});

//Logout / sair
$this->get('logout', function () {
    Auth::logout();
    return Redirect::to("/");
});
//Login / Registar
Auth::routes();
$this->get('/register', function () {
    return redirect('administrativo/usuario/index');
})->middleware('auth');
#-------------------------------------------------------------Front End-----------------------------------------------------------------------------------
/*
 * Font End
 */

$this->group(array('middleware' => 'web'), function () {

    $this->get('/', array('as' => 'front.index', 'uses' => 'FrontEnd\FrontEndController@index'));

    /*
     * Pedido de Oração
     */
    $this->post('pedido-de-oracao', array('as' => 'front.peididoOracao', 'uses' => 'FrontEnd\PedidoOracaoController@store'));
    /*
     * Artigos
     */
    $this->group(array('prefix' => 'artigos'), function () {
        $this->get('', array('as' => 'blog.index', 'uses' => 'FrontEnd\Artigo\ArtigoController@index'));
        $this->get('get/{id}', array('as' => 'blog.get', 'uses' => 'FrontEnd\Artigo\ArtigoController@get'));
        //A Paginação aceita somente verbo GET, mais no meu caso eu tique que ter POST para mandar as informaçõe para o controller
        $this->post('search', array('as' => 'blog.search', 'uses' => 'FrontEnd\Artigo\ArtigoController@search'));
        $this->get('search', array('as' => 'blog.search', 'uses' => 'FrontEnd\Artigo\ArtigoController@search'));
        //Fim da rota de Paginação, só para eu me lembrar no futuro.
        $this->get('search/departamento/{id}', array('as' => 'blog.search.departamento.get', 'uses' => 'FrontEnd\Artigo\ArtigoController@searchDepartamentoGet'));
        $this->post('search/departamento', array('as' => 'blog.search.artigos.departamento.post', 'uses' => 'FrontEnd\Artigo\ArtigoController@searchDepartamentoPost'));
    });
    /*
     * Galeria de Imagens
     */
    $this->group(array('prefix' => 'galeria'), function () {
        $this->get('', array('as' => 'galeria.index', 'uses' => 'FrontEnd\Galeria\GaleriaImagensController@index'));
        $this->get('get/{id}', array('as' => 'galeria.get', 'uses' => 'FrontEnd\Galeria\GaleriaImagensController@get'));
    });
    /*
     * Sound Cloud
     */
    $this->group(array('prefix' => 'soundcloud'), function () {
        $this->get('', array('as' => 'soundcloud.index', 'uses' => 'FrontEnd\SoundCLoud\SoundCloudController@index'));
        $this->post('get', array('as' => 'soundcloud.get', 'uses' => 'FrontEnd\SoundCLoud\SoundCloudController@get'));
        $this->get('get', array('as' => 'soundcloud.get', 'uses' => 'FrontEnd\SoundCLoud\SoundCloudController@get'));
    });
    /*
     * Youtube
     */
    $this->group(array('prefix' => 'videos'), function () {
        $this->get('', array('as' => 'youtube.index', 'uses' => 'FrontEnd\Youtube\YoutubeController@index'));
        $this->post('get', array('as' => 'youtube.get', 'uses' => 'FrontEnd\Youtube\YoutubeController@get'));
        //A Paginação aceita somente verbo GET, mais no meu caso eu tique que ter POST para mandar as informaçõe para o controller
        $this->post('search', array('as' => 'youtube.search', 'uses' => 'FrontEnd\Youtube\YoutubeController@search'));
        $this->get('search', array('as' => 'youtube.search', 'uses' => 'FrontEnd\Youtube\YoutubeController@search'));
        //Fim da rota de Paginação, só para eu me lembrar no futuro.
        $this->get('search/departamento/{id}', array('as' => 'blog.search.departamento.get', 'uses' => 'FrontEnd\Youtube\YoutubeController@searchDepartamentoGet'));
        $this->post('search/departamento', array('as' => 'blog.search.departamento.post', 'uses' => 'FrontEnd\Youtube\YoutubeController@searchDepartamentoPost'));

    });
    /*
     * Eventos
     */
    $this->group(array('prefix' => 'eventos'), function () {
        $this->get('', array('as' => 'eventos.todos', 'uses' => 'FrontEnd\Eventos\EventoController@index'));
        $this->get('calendario', array('as' => 'eventos.celendario.index', 'uses' => 'FrontEnd\Eventos\EventoController@calendario'));
        $this->get('/{id}', array('as' => 'eventos.get', 'uses' => 'FrontEnd\Eventos\EventoController@get'));
        $this->get('/search/{id}', array('as' => 'eventos.search.front', 'uses' => 'FrontEnd\Eventos\EventoController@search'));
        $this->post('/search/', array('as' => 'eventos.post.seach', 'uses' => 'FrontEnd\Eventos\EventoController@searchPost'));
    });
    $this->group(array('prefix' => 'contato'), function () {
        $this->get('', array('as' => 'contato.index', 'uses' => 'FrontEnd\Contato\ContatoController@index'));
        $this->post('store', array('as' => 'contato.store', 'uses' => 'FrontEnd\Contato\ContatoController@store'));
    });
});
/*
 * Fim das rotas do Front End
 */
