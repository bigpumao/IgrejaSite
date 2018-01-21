
@extends('frontend.template')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-8 col-sm-offset2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">

                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $calendar->script() !!}
@endsection