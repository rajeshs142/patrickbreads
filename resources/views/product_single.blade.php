@extends('layouts.app')

@include('partials.meta-tags', ['title' => $product->name.' - Patricks Breads', 'ogtype' => 'website', 'ogtitle' => $product->name.' - Patricks Breads', 'ogdescription' => $product->description])

@section('body_class', 'default product-page')

@section('content')
<main>
    <div class="product-single container" @include('partials.styles', ['styles' => $productSingleStyles])>
        <div class="crumb-wrapper row">
                <div class="crumbs col-lg-8">
                <a class="crumb" href="/"> Home </a>
                <span> > </span>
                @for($i=0; $i < count($product_categories); $i++)
                    @foreach($product_categories[$i] as $pc)
                        @if($pc->name)
                            <a class="crumb" href="/category/{{ $pc->category_slug }}">{{ $pc->name }} </a>
                            <span> > </span>
                        @endif
                    @endforeach
                @endfor
                </div>
                <div class="col-lg-4 hidden-lg-down ta-r">
                    @include('partials.share')
                </div>
        </div>
        <h2 class="item-name item-heading-wrapper">{{ $product->name }}</h2>
        
        <div class="row item">
            <div class="item-description">{{ $product->description }}</div>
            <div class="col-sm-6">
                <img class="item-img" src="{{ $product->thumb_url }}">
            </div>
            <div class="specs text-left col-sm-6 mb-4">
                <div class="specs-heading text-center">Specs</div>
                <div class="row">
                    <div class="col-4"><label>Dimensions</label></div>
                    <div class="col-8">{{ $product->dimensions }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>Serving Size</label></div>
                    <div class="col-8">{{ $product->serving_size }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>Shelf Life</label></div>
                    <div class="col-8">{{ $product->shelf_life }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>Storage</label></div>
                    <div class="col-8">{{ $product->storage }}</div>
                </div>
                <!--div class="row">
                    <div class="col-4"><label>color</label></div>
                    <div class="col-8">{{ $product->color }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>texture</label></div>
                    <div class="col-8">{{ $product->texture }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>size</label></div>
                    <div class="col-8">{{ $product->size }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>pack_size</label></div>
                    <div class="col-8">{{ $product->pack_size }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>unit_weight</label></div>
                    <div class="col-8">{{ $product->unit_weight }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>case_weight</label></div>
                    <div class="col-8">{{ $product->case_weight }}</div>
                </div>
                <div class="row">
                    <div class="col-4"><label>energy</label></div>
                    <div class="col-8">{{ $product->energy }}</div>
                </div-->
            </div>
        </div>
    </div>
    <div>
        @include('partials.products_list', ['products' => $products, 'category' => 'More '.$pc->name])
    </div>
    @include('partials.search_modal')
</main>
@endsection
