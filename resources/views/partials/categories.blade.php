@if(count($categories))
<section class="categories section-padding section-bg" @include('partials.styles', ['styles' => $categoriesStyles])>
    @if(isset($categoriesConfig['heading']))
        <h2 class="heading">{{ $categoriesConfig['heading'] }}</h2>
    @endif
    <ul>
        @foreach($categories as $category)
        <li>
            <div class="category-wrapper">
                @if($category->url)
                <a href="{{ $category->url }}">
                @elseif($category->category_slug)
                <a href="/category/{{ $category->category_slug }}">
                @else
                <a href="/category/{{ $category->name }}">
                @endif
                    <div class="category-name">
                        {{ $category->name }}
                    </div>
                    <img src="{{ $category->thumb_img }}" height="200px">
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</section>
@endif