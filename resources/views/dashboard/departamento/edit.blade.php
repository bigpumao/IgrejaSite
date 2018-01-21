@extends('dashboard.template')
@section('content')
    {!! Form::model($dep , array('route'    => array( 'departamento.update', $dep->id), 'method'    =>  'POST')) !!}
    @include('dashboard.departamento.formulario')
    {!! Form::close() !!}
@stop