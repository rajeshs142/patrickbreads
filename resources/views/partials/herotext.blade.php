@if(count($heroTxtConfig))
    <h1  class="hero-wrapper" @include('partials.styles', ['styles' => $herotextStyles])>
        @foreach($heroTxtConfig as $txt)
            <div>{{$txt}}</div>
        @endforeach
    </h1>
@else
    <h1 class="hero-wrapper col-sm-6" @include('partials.styles', ['styles' => $herotextStyles])>
        <div style="padding-bottom: 40px;">
            <img src="/img/pb_logo_text.png" height="100px" width="300px">
        </div>
        <div>BUILD YOUR BUSNESS WITH US.</div>
        <div>
            <button type="button" class="btn btn-lg btn-success hero-btn" data-toggle="modal" data-target="#customerFeedback" data-whatever="@mdo">Become our customer today.</button>
        </div>
    </h1>
    @include('partials.modal')
@endif