@if(count($heroTxtConfig))
    <h1  class="hero-wrapper" @include('partials.styles', ['styles' => $herotextStyles])>
        @foreach($heroTxtConfig as $txt)
            <div>{{$txt}}</div>
        @endforeach
    </h1>
@else
    <h1 class="hero-wrapper" @include('partials.styles', ['styles' => $herotextStyles])>
        <div>Welcome</div>
        <div>To</div>
        <a href="{{ url('/') }}" class="hero-brand">{{ env('BRAND_NAME') }}</a>
    </h1>
@endif