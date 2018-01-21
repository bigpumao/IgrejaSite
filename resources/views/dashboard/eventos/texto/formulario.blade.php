<div class="section">
    <style>
        .margin{
            margin-top:10px; 

        }
        .table th {
            font-weight: 300;
            color: #0f3e68;
        } 
    </style>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <h2><a href="{{route('eventos.index')}}" data-toggle="tooltip" data-placement="top" title="Listagem de Eventos"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
            </div>
        </div>
        <div class="row">
            @if(Session::has('msg'))
            <div class="alert alert-success">{{Session::get('msg')}}</div>
            @elseif(Session::has('error'))
            <div class="alert alert-error">{{Session::get('error')}}</div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-5">
                @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach        
                        </ul>
                    </div>
                </div>    
                @endif
            </div>
        </div>    

        <div class="col-md-12">

            <div class="row">
                <div class="col-md-2">
                    {!!Form::label('checkbox','Slide Show',['class'    =>  'label-control'])!!}
                    {{ Form::select('checkbox',[false =>'Não',true =>  'Sim'],null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    {!!Form::label('dataInicio','Data de Inicio',['class'    =>  'label-control'])!!}
                    {!!Form::date('data_inicio', null, ['class'  =>  'form-control datepicker','id'    =>  'dataInicio',   'placeholder'   =>  'Click Data do Evento'])!!}
                </div>
                <div class="col-md-2">
                    {!!Form::label('dataFim','Data do Fim',['class'    =>  'label-control'])!!}
                    {!!Form::date('data_fim', null, ['class'  =>  'form-control datepicker','id'    =>  'dataFim',   'placeholder'   =>  'Click Data do Evento'])!!}
                </div>
                <div class="col-md-4">
                    {!!Form::label('departamento','Departamento',['class'    =>  'label-control'])!!}
                    {{ Form::select('departamento',$departamento,null, ['class' => 'form-control' , 'placeholder'   =>  'Escolha uma opção']) }}

                </div>
                <div class="col-md-2">
                    {!!Form::label('status','Status',['class'    =>  'label-control'])!!}
                    {{ Form::select('status',['0'=>'Inativo','1' =>  'Ativo'],null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    {!!Form::label('horas','Horas do inicio',['class'    =>  'label-control'])!!}
                    {!!Form::text('horas',null,['class' =>  'form-control' , 'placeholder'  =>  'Exemplo: 19:30','id' => 'titulo'])!!}
                </div>
                <div class="col-md-2 ">
                    {!!Form::label('semana','Dia da Semana',['class'    =>  'label-control'])!!}
                    {!!Form::select('semana',[
                    'Segunda-Feira'     =>  'Segunda-Feira',
                    'Terça-Feira'       =>  'Terça-Feira',
                    'Quarta-Feira'      =>  'Quarta-Feira',
                    'Quinta-Feira'      =>  'Quinta-Feira',
                    'Sexta-Feira'       =>  'Sexta-Feira',
                    'Sabado'            =>  'Sabado',
                    'Domingo'           =>  'Domingo',

                    ],null,['class' =>  'form-control','placeholder'  =>  'Escolha uma opção','id' => 'titulo'])!!}
                </div>
                <div class="col-md-3 ">
                    {!!Form::label('titulo','Titulo do Evento',['class'    =>  'label-control'])!!}
                    {!!Form::text('titulo',null,['class' =>  'form-control','id' => 'titulo'])!!}
                </div>
                <div class="col-md-2">
                    {!! Form::label('status' , 'Esse evento expira automaticamente',['class'   =>  'control-label']) !!}<br>

                    <label class="radio-inline">
                        {!! Form::radio('expirar' , 1, true,  null, ['class'    =>  'from-control']) !!}Expirar
                        {{--<input type="radio" value="0" name="expirar">--}}
                    </label>
                </div>
                <div class="col-md-2">
                    {!!Form::label('local','Local do Evento',['class'    =>  'label-control'])!!}
                    {!!Form::text('local',null,['class' =>  'form-control' ])!!}
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 col-md-offset-1">
                    @if(Request::is('*/create'))
                    {!!Form::label('imagem','Imagem do Evento',['class'    =>  'label-control'])!!}
                    <img  src="/imagens/eventos/eventos.jpg" width="800;" height="300;">
                    @else
                    {!!Form::label('imagem','Imagem do Evento',['class'    =>  'label-control'])!!}
                    <img  src="/imagens/eventos/{{$update->imagem}}" width="800;" height="300">
                    @endif
                </div>
                <div class="col-md-4">
                    {!! Form::file('imagem', array('class'   => 'pull-left'))!!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12  margin">
                {!!Form::textarea('descricao',null, ['class' =>  'form-control','cols'   => '50','rows'=>'15','id'=>'editor1'])!!}
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-7 col-md-offset-5">
                <button class="button btn btn-primary btn-md pull-right" type="submit"> Salvar</button>
            </div>
        </div>

    </div>
</div>
</div>