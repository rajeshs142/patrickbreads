@if(count($products))
<section class="products section-padding" @include('partials.styles', ['styles' => $productsListStyles])>
    @if(count($category))
        <h2 class="heading">{{$category}}</h2>
    @endif
    <div class="ta-c">
        {{ $products->links() }}
    </div>
    <ul>
        @foreach($products as $product)
        <li>
            <div class="product-wrapper">
                @if($product->product_slug)
                <a href="/item/{{ $product->product_slug }}">
                @else
                <a href="/item/{{ $product->name }}">
                @endif
                    <div class="product-name" title="{{ $product->name }}">
                        {{ $product->name }}
                    </div>
                    <img src="{{ $product->thumb_url }}" height="auto">
                </a>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="ta-c">
        {{ $products->links() }}
    </div>
</section>
@else
<section class="products none" @include('partials.styles', ['styles' => $productsListStyles])>
    Currently, There are no products in this category.
</section>
@endif
