@extends('dashboard.template')
@section('content')
    {!! Form::model($aviso ,array('route'    => ['aviso.update',$aviso->id], 'method' =>  'POST')) !!}
    @include('dashboard.quadro-aviso.formulario')
    {!! Form::close() !!}
@endsection