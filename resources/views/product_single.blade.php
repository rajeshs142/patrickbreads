@extends('layouts.app')

@include('partials.meta-tags', ['title' => 'Patricks Breads - '.$product->name, 'ogtype' => 'website', 'ogtitle' => 'Patricks Breads - '.$product->name, 'ogdescription' => $product->description])

@section('body_class', 'default')

@section('content')
<main>
    <div class="product-single container" @include('partials.styles', ['styles' => $productSingleStyles])>
        <div class="item-heading-wrapper">
            <div class="crumbs">
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
            <h2 class="item-name">{{ $product->name }}</h2>
        </div>
        <div class="row item">
            <div class="item-description">{{ $product->description }}</div>
            <div class="col-sm-6">
                <img class="item-img" src="{{ $product->thumb_url }}">
            </div>
            <div class="specs col-sm-6">
                <div class="specs-heading">Specs</div>
                <div class="row">
                    <div class="col-xs-4"><label>color</label></div>
                    <div class="col-xs-8">{{ $product->color }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>texture</label></div>
                    <div class="col-xs-8">{{ $product->texture }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>size</label></div>
                    <div class="col-xs-8">{{ $product->size }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>pack_size</label></div>
                    <div class="col-xs-8">{{ $product->pack_size }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>unit_weight</label></div>
                    <div class="col-xs-8">{{ $product->unit_weight }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>case_weight</label></div>
                    <div class="col-xs-8">{{ $product->case_weight }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>shelf_life</label></div>
                    <div class="col-xs-8">{{ $product->shelf_life }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>storage</label></div>
                    <div class="col-xs-8">{{ $product->storage }}</div>
                </div>
                <div class="row">
                    <div class="col-xs-4"><label>energy</label></div>
                    <div class="col-xs-8">{{ $product->energy }}</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('partials.products_list', ['products', $products])
    </div>
</main>
@endsection
