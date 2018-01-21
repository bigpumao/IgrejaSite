<style>
    .margin {
        margin-bottom: 30px;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('departamento.index')}}" data-toggle="tooltip" data-placement="top"
                   title="Lista de Categoria"><i class="fa fa-television" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div class="row margin">
        <div class="col-md-4 col-md-offset-4">
            <label for="">Cadastro de Departamanto</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            {!! Form::label('departamento', 'Departamento') !!}
            {!! Form::text('departamento' , null , ['class' =>  'form-control']) !!}
        </div>
    </div>
    <div class="row margin">
        <div class="col-md-4">

            {!! Form::submit('Cadastrar' , ['class' =>  'btn btn-md btn-primary pull-right']) !!}
        </div>
    </div>

</div>
