<style>
    #margin{
        margin-top: 10px;
    }
</style>
<section>
    <div class="row">
        <div class="col-md-3">
            <h2><a href="{{route('video.index')}}" data-toggle="tooltip" data-placement="top" title="Lista de Eventeos em Vídeo"><i class="fa fa-television" aria-hidden="true"></i></a></h2> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
            @if(Session::has('errors'))
                @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
            @endif

    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h5>CRIANDO LISTA DE EVENTOS EM VÍDEO</h5>
        </div>
       
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Titilo do Vídeo</label>
            {!!Form::text('titulo' , null,['class'   =>  'form-control'] )!!}
        </div>
        <div class="col-md-3">
            <label>Frame do Youtube</label>
            {!!Form::text('frame' , null,['class'   =>  'form-control'] )!!}
        </div>
        <div class="col-md-3">
            <label>Departamento</label>
            {!!Form::select('departamento' , $departamento,null,['class'   =>  'form-control' , 'placeholder'   =>    'Escolha uma opção'] )!!}
        </div>
         <div class="col-md-3">
            <label>Status</label>
             {!!Form::select('status' , [false    =>  'Inativo', true  =>  'Ativo'],null,['class'   =>  'form-control'] )!!}
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Descrição do Evento</label>
            {!!Form::textarea('descricao',null,['class' =>  'form-control'])!!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!!Form::submit('Salvar' , ['class' =>  'btn btn-primary pull-right' , 'id'    =>  'margin'])!!}
        </div>
    </div>
</section>