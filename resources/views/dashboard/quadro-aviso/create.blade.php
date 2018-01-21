@extends('dashboard.template')
@section('content')
    {!! Form::open(array('route'    =>  'aviso.store', 'method' =>  'POST')) !!}
        @include('dashboard.quadro-aviso.formulario')
    {!! Form::close() !!}
@endsection