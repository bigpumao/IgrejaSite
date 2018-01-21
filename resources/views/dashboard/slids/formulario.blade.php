<style>
    .margin{
        margin-top: 10px;
    }
</style>
<div class="row">
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <h3>
                    <a href="{{route('slids.index')}}" data-toggle="tooltip" data-placement="top" title="Voltar a Listagem"><i class="fa fa-television"></i></a>
                </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::label('titutlo' , 'Titulo',['class'   =>  'control-label']) !!}
                {!!Form::text('titulo' , null,['class'  =>  'form-control']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('status' , 'Status',['class'   =>  'control-label']) !!}
                {!!Form::select('status' ,[
                false   =>  'Inativo', true=>   'Ativo'
                ], null,['class'  =>  'form-control' , 'placeholder'    =>  'Escolha uma Opção']) !!}
            </div>

        </div>
        <div class="row margin">
            @if(Request::is('*/create'))
            <div class="col-md-4 col-md-offset-2">
                <img  src="/imagens/slids/slids.jpg"  alt="" width="600" height="400">
            </div>
            @else
                <div class="col-md-4 col-md-offset-2">
                    <img src="/imagens/slids/{{$slid->imagem}}"  alt="" width="600" height="400">
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                {!! Form::file('imagem') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                {!! Form::submit('Cadastrar' , ['class'    =>  'btn btn-primary btn-md pull-right']) !!}
            </div>
        </div>
    </div>
</div>