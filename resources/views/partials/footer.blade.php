<footer class="row section-padding" @include('partials.styles', ['styles' => $footerStyles])>
    <div class="col-sm-6 social">
        <h2 class="footer-logo">
            <img src="/img/pb_logo.png" width="35px">
            <img src="/img/pb_text.png" width="160px">
        </h2>
        <ul class="contact">
            @foreach ($footerConfig as $f)
                @if (isset($f['url']) && isset($f['title']))
                    <li>
                        <a href="{{ $f['url'] }}">{{$f['title']}}</a>
                    </li>
                @elseif (isset($f['title']))
                    <li>{{$f['title']}}</li>
                @endif
            @endforeach
        </ul>
    </div>
    @include('partials.feedback_form', ['feedbackConfig' => $feedbackConfig])
</footer>
