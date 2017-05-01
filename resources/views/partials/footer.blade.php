<footer id="footer" class="row section-padding" @include('partials.styles', ['styles' => $footerStyles])>
    <div class="col-sm-6 social">
        <h2 class="footer-logo">
            <img src="/img/breads_g_w.png" width="50px">
            <img src="/img/pb_logo_g1_w.png" i="" width="100px">
        </h2>
        <ul class="contact">
            @foreach ($footerConfig as $f)
                @if (isset($f['url']) && isset($f['title']))
                    <li>
                        <a href="{{ $f['url'] }}">
                            <i class="icon fa {{$f['icon']}}"></i>
                            {{$f['title']}}
                        </a>
                    </li>
                @elseif (isset($f['title']))
                    <li>
                        <i class="icon fa {{$f['icon']}}"></i>
                        {{$f['title']}}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    @include('partials.feedback_form', ['feedbackConfig' => $feedbackConfig])
</footer>
