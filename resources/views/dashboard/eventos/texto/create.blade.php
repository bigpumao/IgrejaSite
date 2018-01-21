@extends('dashboard.template')
@section('content')
 {!! Form::open(['route'  => 'eventos.store' , 'method'  =>  'post', 'files' => true]) !!}
 @include('dashboard.eventos.texto.formulario')
 {!!Form::close()!!}
@stop