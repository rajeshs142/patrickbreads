@if(count($storyConfig))
    <section class="story section-padding section-bg" @include('partials.styles', ['styles' => $storyStyles])>
        @if(isset($storyConfig['border-img']['src']))
            <img src="{{ $storyConfig['border-img']['src']}}" width="120px">
            <br>
            <br>
        @endif
        @if(isset($storyConfig['welcome-txt']))
            <div class="welcome">{{ $storyConfig['welcome-txt']}}</div>
        @endif
        @if(isset($storyConfig['headline']))
            <h2 class="heading">{{ $storyConfig['headline']}}</h2>
        @endif
        @if(isset($storyConfig['story-txt']))
            <div class="body">{{ $storyConfig['story-txt']}}</div>
        @endif
        @if(isset($storyConfig['border-img']['src']))
            <br>
            <br>
            <img src="{{ $storyConfig['border-img']['src']}}" width="120px">
        @endif
    </section>
@endif