@if(count($galleryConfig) > "1")
<section class="gallery section-padding" @include('partials.styles', ['styles' => $galleryStyles])>
    <div class="img-gallery">
        @foreach($galleryConfig as $image)
            @if(isset($image['src']))
            <div>   
                <img data-lazy="{{ $image['src'] }}">
            </div>
            @endif
        @endforeach
    </div>
</section>
@endif
