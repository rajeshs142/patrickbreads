@if(count($heroTxtConfig))
    <h1  class="hero-wrapper" @include('partials.styles', ['styles' => $herotextStyles])>
        @foreach($heroTxtConfig as $txt)
            <div>{{$txt}}</div>
        @endforeach
    </h1>
@else
    <h1 class="hero-wrapper col-12" @include('partials.styles', ['styles' => $herotextStyles])>
        <div class="hero-brand">
            <img class="breads_icon" src="/img/breads_g_w.png"> 
            <img class="logo_icon" src="/img/pb_logo_g1_w.png">
        </div>
        <div>Build your business with us.</div>
        <div>
            <button type="button" class="btn btn-lg btn-secondary hero-btn" data-toggle="modal" data-target="#customerFeedback" data-whatever="@mdo">Become our customer today.</button>
        </div>
    </h1>
    @include('partials.modal')
@endif
