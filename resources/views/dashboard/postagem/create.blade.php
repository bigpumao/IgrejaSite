@extends('dashboard.template')

@section('content')
{!! Form::open(['route'  => 'store' , 'method'  =>  'post', 'files' => true]) !!}
@include('dashboard.postagem.formulario')
{!!Form::close()!!}

@endsection

