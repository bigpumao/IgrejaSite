@extends('dashboard.template')
@section('content')
    {!! Form::open(array('route'    =>  'slids.store',  'method'    =>  'POST', 'files' =>  true)) !!}
        @include('dashboard.slids.formulario')
    {!! Form::close() !!}
@endsection