@extends('dashboard.template')
@section('content')
    @include('dashboard.grafico.navbar-grafico')
    {!! Charts::styles() !!}
    <div class="app">
        <center>
            {!! $chart->html() !!}
        </center>
    </div>
    <!-- End Of Main Application -->
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection