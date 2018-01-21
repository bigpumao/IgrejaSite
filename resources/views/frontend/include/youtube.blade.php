<div class="styleswitcher visible-lg visible-md">
    <div class="arrow-box"><a class="switch-button"><span class="fa fa-youtube fa-lg"></span></a> </div>
    @foreach($youtube as $tube)
        <ul class="youtube">
            {!! $tube->frame !!}
        </ul>
    @endforeach

    <a href="#">Veja mais videos</a>
</div>