<ul class="nav-transparent" @include('partials.styles', ['styles' => $navTopStyles])>
    <li>
        @include('partials.searchform_nav_top', ['searchStyle' => ''])
    </li>
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
    <!-- <li class="nav-more dropdown">
        <a role="button" href="#" data-toggle="dropdown" class="dropdown-toggle more-lnk">
      More <span class="caret"></span>
    </a>
        <ul id="submenu" class="dropdown-menu"></ul>
    </li> -->
</ul>