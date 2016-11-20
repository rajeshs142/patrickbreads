@if(count($banner))
    <div class="banner" @include('partials.styles', ['styles' => $bannerStyles])>
        <span class="banner-left">{{ $banner->title_left }}</span>
        @if ($banner->title_right)
            <span> | </span>
            @if ($banner->link)
            <a href="{{ $banner->link }}">
                <i class="banner-right">{{ $banner->title_right }}</i>
            </a>
            @else
            <i class="banner-right">{{ $banner->title_right }}</i>
            @endif
        @endif
    </div>
@endif