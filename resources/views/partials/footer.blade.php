<footer id="footer" class="container-fluid section-padding" @include('partials.styles', ['styles' => $footerStyles])>
    <!--h2 class="footer-logo">
        <img src="/img/breads_g_w.png" width="50px">
        <img src="/img/pb_logo_g1_w.png" i="" width="100px">
    </h2 -->
    <div class="social">
        <div class="contact links mb-4">
            <span class="mr-3">
                <a href="/contact">
                    Contact
                </a>
            </span>
            <span class="mr-3">
                <a href="https://www.facebook.com/PatricksContinentalBreads/">
                    Testimonials
                </a>
            </span>
            <span class="mr-3">
                <a href="#" data-toggle="modal" data-target="#searchModal">Search</a>
            </span>
        </div>
        <div class="contact">
            @foreach ($footerConfig as $ff)
                <div class="mb-4">
                @foreach ($ff as $f)
                    @if (isset($f['url']) && isset($f['icon']) && !isset($f['title']))
                        <span class="mr-3">
                            <a href="{{ $f['url'] }}">
                                <i class="icon fa {{$f['icon']}}"></i>
                            </a>
                        </span>
                    @elseif (isset($f['url']) && isset($f['title']))
                        <div>
                            <a href="{{ $f['url'] }}">
                                <i class="icon fa {{$f['icon']}}"></i>
                                {{$f['title']}}
                            </a>
                        </div>
                    @elseif (isset($f['title']))
                        <div>
                            <i class="icon fa {{$f['icon']}}"></i>
                            {{$f['title']}}
                        </div>
                    @endif
                @endforeach
                </div>
            @endforeach
        </div>
        <div class="contact pt-3" style="border-top: 1px solid #6d6d6d;">
            @include('partials.copyright')
        </div>
    </div>
</footer>
