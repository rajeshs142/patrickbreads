@extends('layouts.app')

@include('partials.meta-tags', ['title' => $product->name.' - Patricks Breads', 'ogtype' => 'website', 'ogtitle' => $product->name.' - Patricks Breads', 'ogdescription' => $product->description])

@section('body_class', 'default product-page')


<!-- <ol itemscope itemtype="http://schema.org/BreadcrumbList">
  <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="https://example.com/dresses">
    <span itemprop="name">Dresses</span></a>
    <meta itemprop="position" content="1" />
  </li>
  <li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="https://example.com/dresses/real">
    <span itemprop="name">Real Dresses</span></a>
    <meta itemprop="position" content="2" />
  </li>
</ol> -->


@section('content')
<main>
    <div class="product-single container" @include('partials.styles', ['styles' => $productSingleStyles])>
        <div class="crumb-wrapper row">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="crumbs col-lg-8">
					<li class="d-inline-block" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                	<a itemprop="item" class="crumb" href="/">
							<span itemprop="name">Home</span>
						</a>
	                	<span> > </span>
					    <meta itemprop="position" content="1" />
						
					</li>
	                @for($i=0, $j=2; $i < count($product_categories); $i++, $j++)
	                    @foreach($product_categories[$i] as $pc)
	                        @if($pc->name)
								<li class="d-inline-block" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                            	<a itemprop="item" class="crumb" href="/category/{{ $pc->category_slug }}">
										<span itemprop="name">{{ $pc->name }}</span>
									</a>
	                            	<span> > </span>
								    <meta itemprop="position" content="{{$j}}" />
									
								</li>
	                        @endif
	                    @endforeach
	                @endfor
                </ol>
                <div class="col-lg-4 hidden-lg-down ta-r">
                    @include('partials.share')
                </div>
        </div>
        <h2 class="item-name item-heading-wrapper">{{ $product->name }}</h2>
        <div class="item-description">{{ $product->description }}</div>
        <div class="row item">
            <div class="col-sm-6">
                <img class="item-img" src="{{ $product->thumb_url }}">
            </div>
            <div class="specs text-left col-sm-6 mb-4">
                <div class="specs-heading text-center">Specs</div>
                <div class="row">
                    <div class="col-4"><label>Dimensions</label></div>
					@if (isset($product->dimensions))
	                    <div class="col-8"><label>{{ $product->dimensions }}</label></div>
					@else
						<div class="col-8"></div>
					@endif
                </div>
                <div class="row">
                    <div class="col-4"><label>Serving Size</label></div>
					@if (isset($product->serving_size))
	                    <div class="col-8"><label>{{ $product->serving_size }}</label></div>
					@else
						<div class="col-8"></div>
					@endif
                </div>
                <div class="row">
                    <div class="col-4"><label>Shelf Life</label></div>
					@if (isset($product->shelf_life))
	                    <div class="col-8"><label>{{ $product->shelf_life }}</label></div>
					@else
						<div class="col-8"></div>
					@endif
                </div>
                <div class="row">
                    <div class="col-4"><label>Storage</label></div>
					@if (isset($product->storage))
	                    <div class="col-8"><label>{{ $product->storage }}</label></div>
					@else
						<div class="col-8"></div>
					@endif
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
