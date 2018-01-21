@extends('dashboard.template')
@section('content')
    <style>
        .margin {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('msg'))
                <div id="msg" class="alert alert-success"><strong>
                        <center>{{Session::get('msg')}}</center>
                    </strong></div>
            @elseif(Session::has('error'))
                <div id="msg" class="alert alert-danger"><strong>
                        <center>{{Session::get('error')}}</center>
                    </strong></div>
            @elseif(Session::has('info'))
                <div id="msg" class="alert alert-info"><strong>
                        <center>{{Session::get('info')}}</center>
                    </strong></div>
            @elseif(Session::has('errors'))
                @foreach($errors->all() as $error)
                    <div id="msg" class="alert alert-danger"><strong>
                            <center>{{$error}}</center>
                        </strong></div>
                @endforeach
            @endif
        </div>
    </div>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <img src="/uploads/avatars/{{ $avatar->avatar }}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{$avatar->name }}</h2>
            </div>

            <div class="col-md-10 pull-right">
                <form enctype="multipart/form-data" action="/administrativo/perfil/update" method="POST">
                    <label>Atualizar imagem do perfil</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary margin" value="Enviar avatar">
                </form>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Biografia</h3>
            </div>
            <div class="panel-body">
                <div class="row margin">
                    <section class="widget">
                        <header>
                            <h4><i class="fa fa-file-alt"></i> <span>Biografia:</span><strong> Escreva sobre sua função
                                    na
                                    Igreja </strong></h4>
                        </header>
                        <div class="body">
                            {!! Form::model($avatar , ['route'   =>  ['bio.update', $avatar->id] , 'method'  =>  'POST'] ,['class'   =>  'form-horizontal', 'id' =>  'article-form' , 'article-form' =>  false]) !!}
                            <form class="form-horizontal" role="form" id="article-form" method="post"
                                  novalidate="false">
                                <fieldset>
                                    {!!Form::textarea('descricao',null,['class'   =>  'form-control input-transparent', 'rows'   =>  '10'])!!}
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="btn-toolbar pull-right" style="margin">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                <button type="button" class="btn btn-default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </section>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Informações Pessoais</h3>
        </div>
        <div class="panel-body">
            <section>
                <section class="widget">
                    <div class="body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-align-center">
                                    <img class="img-thumbnail" src="/uploads/avatars/{{$avatar->avatar}}" alt="64x64"
                                         style="height: 112px;">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3 class="mt-sm mb-xs">{{$avatar->name}}</h3>
                                <address>
                                    {{--<strong>Development manager</strong> at <strong><a href="#">Allexample Inc.</a></strong><br>--}}
                                    <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">{{$avatar->email}}
                                    </a><br>
                                    @foreach($avatar->contatos as $contato)
                                        <abbr title="Work Phone">telefone: {{$contato->telefone}} </abbr>
                                    @endforeach
                                </address>
                            </div>
                        </div>
                        <fieldset class="mt-sm">
                            <legend>
                                <small>Formulário de Contato</small>
                            </legend>
                        </fieldset>
                        {!! Form::open(array('route'    =>  'usercontato.store' , 'method'  =>  'post' ) , ['class'   =>  'form-horizontal form-label-left']) !!}

                        <fieldset>
                            <legend class="section">Informações Pessoas para contato</legend>
                            <div class="form-group margin">
                                <label class="control-label col-sm-4" for="last-name">Telefone <span
                                            class="required">*</span></label>
                                <div class="col-sm-8"><input type="text" id="last-name" name="telefone"
                                                             required="required"
                                                             class="form-control input-transparent" data-parsley-id="8">
                                </div>
                            </div>
                            <br>
                            <div class="form-group margin">
                                <label for="middle-name" class="control-label col-sm-4">Endereço <span
                                            class="required">*</span></label>
                                <div class="col-sm-8"><input id="middle-name" class="form-control input-transparent"
                                                             type="text" name="endereco" value="" data-parsley-id="10">
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 margin">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </section>
            </section>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Usuário e Senha</h3>
        </div>
        <div class="panel-body">
            <section class="widget">
                <div class="body">
                    <form action="/administrativo/perfil/users/{{$avatar->id}}" class="form-horizontal" method="POST">
                        {{csrf_field()}}
                        <fieldset>
                            <legend class="section">Formulário</legend>
                            <div class="form-group">
                                <label for="normal-field" class="col-sm-4 control-label">Nome</label>
                                <div class="col-sm-7">
                                    <input type="text" id="normal-field" name="name" value="{{$avatar->name}}"
                                           class="form-control" placeholder="Nome">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password-field">Senha</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control input-transparent"
                                               id="password-field" placeholder="Senha">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password-field">Repeta a senha</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="contraSenha" class="form-control input-transparent"
                                               id="password-field" placeholder="Senha">
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-sm-8 ">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@endsection
