<style>
    .margin {
        margin-top: 20px;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('aviso.index')}}" data-toggle="tooltip" data-placement="top"
                   title="Lista de Categoria"><i class="fa fa-television" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Form::label('titulo' , 'Titulo') !!}
            {!! Form::text('titulo' , null, ['class'    =>  'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('semana' , 'Dia Da Semana') !!}
            {!! Form::select('semana' ,[
                'Segunda-Feira'     =>  'Segunda-Feira',
                'Terça-Feira'       =>  'Terça-Feira',
                'Quarta-Feira'      =>  'Quarta-Feira',
                'Quinta-Feira'      =>  'Quinta-Feira',
                'Sexta-Feira'       =>  'Sexta-Feira',
                'Sabado'            =>  'Sabado',
                'Domingo'           =>  'Domingo',
                'Geral'             =>  'Geral',
            ] ,null,['class'         =>  'form-control' , 'placeholder' =>  'Escolha uma Opção'] )!!}
        </div>

        <div class="col-md-4">
            {!! Form::label('status' , 'Status') !!}
            {!! Form::select('status',[
                false   =>  'Inativo', true     =>      'Ativo',
            ],null,['class'  =>  'form-control' , 'placeholder' =>  'Escolhe uma opção']) !!}
        </div>
    </div>
    <div class="row margin">
        <div class="col-md-12">
            {!! Form::textarea('descricao' , null, ['class'     =>  'form-control' , 'id'   =>  'editor1']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit('cadastrar', ['class' =>  'btn btn-primary pull-right']) !!}
        </div>
    </div>
</section>
