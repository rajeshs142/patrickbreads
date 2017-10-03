@extends('layouts.app')

@include('partials.meta-tags', ['title' => $category->name.' - Patricks Breads', 'ogtype' => 'website', 'ogtitle' => $category->name.' - Patricks Breads', 'ogdescription' => 'Breads, Sweets, Pastries, Cakes, Gluten Free Range, Catering Range, Packaged Products, New Products'])

@section('body_class', 'default category2')

@section('content')
<main style="background-image:url({{$category->hero_img}});">
    <div class="category" @include('partials.styles', ['styles' => $categoriesStyles])>
        <div class="wrapper container">
            <div class="item-heading-wrapper row">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="crumbs col-lg-8">
				    <li class="d-inline-block" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    	<a itemprop="item" class="crumb" href="/">
							<span itemprop="name">Home</span>
		                    <span> &gt; </span>
						</a>
				    	<meta itemprop="position" content="1" />
					</li>
                    @if($parent_category)
				    <li class="d-inline-block" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    	<a itemprop="item" class="crumb" href="/category/{{ $parent_category->category_slug }}">
							<span itemprop="name"> {{ $parent_category->name }} </span>
		                    <span> &gt; </span>
						</a>
				    	<meta itemprop="position" content="2" />
					</li>
                    @endif
				    <li class="d-inline-block" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    	<a itemprop="item" class="crumb" href="/category/{{ $category->category_slug }}">
							<span itemprop="name"> {{ $category->name }} </span>
		                    <span> &gt; </span>
						</a>
				    	<meta itemprop="position" content="2" />
					</li>
                </ol>
                <div class="col-lg-4 hidden-lg-down ta-r">
                    @include('partials.share')
                </div>
            </div>
            <h2 class="item-name">{{ $category->name }}</h2>
            @if(count($categories))
            <ul class="category-list">
            @foreach($categories as $category1)
                <li>
                    @if($category1->url)
                    <a href="{{ $category1->url }}" title="{{ $category1->name }}">
                    @elseif($category1->category_slug)
                    <a href="category/{{ $category1->category_slug }}" title="{{ $category1->name }}">
                    @else
                    <a href="category/{{ $category1->name }}" title="{{ $category1->name }}">
                    @endif
                        {{ $category1->name }}
                    </a>
                </li>
            @endforeach
            </ul>
            @endif
        </div>
    </div>
</main>
@include('partials.products_list', ['products' => $products, 'category' => 'Products in '.$category->name])
@include('partials.search_modal')
@endsection
