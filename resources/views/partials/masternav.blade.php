<nav class="navbar navbar-toggleable-md">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @include('partials.header')

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" @include('partials.styles', ['styles' => $navStyles])>
            @foreach($nav as $item)
                @if(count($item['children']) > 0)
                    <li class="nav-item dropdown">
                        <a href="{{ $item->link }}" id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ $item->title }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($item['children'] as $child)
                                <a class="dropdown-item" href="{{ $child->link }}">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $item->link }}">{{ $item->title }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
        @include('partials.searchform_nav_top', ['searchStyle' => ''])
    </div><!-- /.navbar-collapse -->
</nav>
