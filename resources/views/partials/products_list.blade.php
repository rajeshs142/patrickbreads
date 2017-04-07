@if(count($products))
<section class="products section-padding" @include('partials.styles', ['styles' => $productsListStyles])>
    <h2 class="heading">{{$category}}</h2>
    <ul>
        @foreach($products as $product)
        <li>
            <div class="product-wrapper">
                @if($product->product_slug)
                <a href="/item/{{ $product->product_slug }}">
                @else
                <a href="/item/{{ $product->name }}">
                @endif
                    <div class="product-name">
                        {{ $product->name }}
                    </div>
                    <img src="{{ $product->thumb_url }}" height="200px">
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</section>
@else
<section class="products none" @include('partials.styles', ['styles' => $productsListStyles])>
    Currently, There are no products in this category.
</section>
@endif
