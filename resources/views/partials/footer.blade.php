<footer class="container-fluid section-padding" @include('partials.styles', ['styles' => $footerStyles])>
    <div class="col-sm-6 social">
        <h2 class="footer-logo">{{ env('BRAND_NAME') }}</h2>
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