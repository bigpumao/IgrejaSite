<style>
    .margin {
        margin-bottom: 10px;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <h3>
                <a href="{{route('listagem')}}" data-toggle="tooltip" data-placement="top" title="Voltar a Listagem"><i
                            class="fa fa-television"></i></a>
            </h3>
        </div>
        <div class="col-md-3">
            <small>Autor: {{$avatar->name}}</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('errors'))
                @if(count('errors'))

                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            <li>{{$error}}</li>
                        </div>
                    @endforeach

                @endif
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row margin ">
                <div class="col-md-4">
                    {!! Form::label('departamento','Departamento', array('class'    =>  'control-label')) !!}
                    {!! Form::select('departamento',$departamento,null,['class'  => 'form-control' , 'placeholder'  =>  'Escolha uma opção']) !!}
                </div>

                <div class="col-md-4">
                    {!! Form::label('status','Status', array('class'    =>  'control-label')) !!}
                    {!! Form::select('status',[

                    false    =>  'Inativo', true   =>  'Ativo',
                    ],null,['class'  => 'form-control' , 'placeholder'  =>  'Escolha uma opção']) !!}
                </div>

                <div class="col-md-4">
                    {!! Form::label('titulo','Titulo do Artigo', array('class'    =>  'control-label')) !!}
                    {!! Form::text('titulo',null, array('class' =>  'col-md-4 form-control', 'id'    =>   'titulo')) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <b>  {!! Form::label('imagem','Imagem', array('class'    =>  'control-label')) !!}</b>
                </div>
            </div>
            @if(Request::route()->getName() == 'edit')
                <div class="row">
                    <div class="col-md-12 col-md-offset-1 margin">
                        <img src="/imagens/artigo/{{$postagem->imagem}}" class="img-responsive" width="800px"
                             height="400px" style="margin-top: 10px;" id="imagem">
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 col-md-offset-1 margin">
                        <img src="/imagens/artigo/artigo.jpg" class="img-responsive" width="800px" height="400px"
                             style="margin-top: 10px;" id="imagem">
                    </div>
                </div>
            @endif
            <div class="row margin">
                <div class="col-md-4 col-md-offset-2">
                    <small>Selecione a imagem no botão ao lado -></small>
                </div>
                <div class="col-md-3">
                    {!! Form::file('imagem', array('class'   => 'pull-left'))!!}
                </div>
            </div>

            <div class="col-md-12 margin">
                {!!Form::textarea('descricao',null,['class' => 'form-control',  'id'    =>   'editor1' ])!!}

            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary pull-right">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</section>