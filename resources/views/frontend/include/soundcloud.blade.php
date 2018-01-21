@if($soundcloud->count() >= 1)
    <div class="row">
        <div class="col-md-4 col-md-offset-5 sondcloud">
            <h3> Sound Recording </h3>
        </div>
    </div>
    <div class="container sondcloud">
        <div class="row">
            @foreach($soundcloud as $sound)
                <div class="grid-item-inner col-md-3 col-sm-3">
                    {!! $sound->frame !!}
                </div>
            @endforeach
        </div>
    </div>
@endif