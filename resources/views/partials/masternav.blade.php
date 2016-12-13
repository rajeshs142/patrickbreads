<nav class="navbar navbar-default navbar-inverse navbar-fixed-top container-fluid">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
     @include('partials.header')

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @include('partials.searchform', ['searchStyle' => 'navbar-left'])
        <ul class="nav navbar-nav navbar-right" @include('partials.styles', ['styles' => $navStyles])>
            @foreach($nav as $item)
                @if(count($item['children']) > 0)
                    <li class="dropdown">
                        <a href="{{ $item->link }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ $item->title }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($item['children'] as $child)
                                <li><a href="{{ $child->link }}">{{ $child->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ $item->link }}">{{ $item->title }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>