@extends('dashboard.template')
@section('content')
 {!!Form::model($update , array('route'  =>  ['eventos.update', $update->id] , 'method'  =>  'post', 'files' =>  'true'))!!}
 @include('dashboard.eventos.texto.formulario')
 {!!Form::close()!!}
@stop