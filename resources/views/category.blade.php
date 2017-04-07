@extends('layouts.app')

@include('partials.meta-tags', ['title' => $category->name.' - Patricks Breads', 'ogtype' => 'website', 'ogtitle' => $category->name.' - Patricks Breads', 'ogdescription' => 'Breads, Sweets, Pastries, Cakes, Gluten Free Range, Catering Range, Packaged Products, New Products'])

@section('body_class', 'default category2')

@section('content')
<main style="background-image:url({{$category->hero_img}});">
    <div class="category" @include('partials.styles', ['styles' => $categoriesStyles])>
        <div class="wrapper container">
            <div class="item-heading-wrapper">
                <div class="crumbs">
                    <a class="crumb" href="/"> Home </a>
                    <span> &gt; </span>
                    @if($parent_category)
                    <a class="crumb" href="/category/{{ $parent_category->category_slug }}"> {{ $parent_category->name }} </a>
                    <span> &gt; </span>
                    @endif
                    <a class="crumb" href="/category/{{ $category->category_slug }}"> {{ $category->name }} </a>
                    <span> &gt; </span>
                </div>
            </div>
            <h2 class="item-name">{{ $category->name }}</h2>
            @if(count($categories))
            <ul class="category-list">
            @foreach($categories as $category)
                <li>
                    @if($category->url)
                    <a href="{{ $category->url }}">
                    @elseif($category->category_slug)
                    <a href="category/{{ $category->category_slug }}">
                    @else
                    <a href="category/{{ $category->name }}">
                    @endif
                        {{ $category->name }}
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
