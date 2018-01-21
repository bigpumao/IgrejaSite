@extends('dashboard.template')
@section('content')
    {!! Form::model($slid , array('route'   =>  array('slids.update', $slid->id) , 'method' =>  'POST', 'files' =>  true)) !!}
    @include('dashboard.slids.formulario')
    {!! Form::close() !!}
@endsection