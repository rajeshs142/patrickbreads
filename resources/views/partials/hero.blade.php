@if(count($heroConfig) == "1")
<section class="hero-single" style="background-image:url({{$heroConfig['img1']['src']}})" @include('partials.styles', ['styles' => $heroStyles])>
    @include('partials.herotext')
</section>
@elseif(count($heroConfig) > "1")
<section class="hero-many" @include('partials.styles', ['styles' => $heroStyles])>
    <div class="hero-carousel"> 
        @foreach($heroConfig as $image)
        <div>
            @if( isset($image['url']) )
                <a href="{{ $image['url'] }}">
                    <img src="{{ $image['src'] }}">
                </a>
            @else
                <img src="{{ $image['src'] }}">
            @endif
        </div>
        @endforeach
    </div>
</section>
@endif