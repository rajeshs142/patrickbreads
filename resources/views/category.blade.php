@extends('layouts.app')

@include('partials.meta-tags', ['title' => 'Patricks Breads - Categories', 'ogtype' => 'website', 'ogtitle' => 'Patricks Breads - Categories', 'ogdescription' => 'Breads, Sweets, Savoury, Beverage, Pantry'])

@section('body_class', 'default')

@section('content')
<main>
    <div class="category" @include('partials.styles', ['styles' => $categoriesStyles])>
        <div class="wrapper container">
            <div class="item-heading-wrapper">
                <div class="crumbs">
                    <a class="crumb" href="/"> Home </a>
                    <span> > </span>
                    <a class="crumb" href="/category/{{ $category->category_slug }}"> {{ $category->name }} </a>
                    <span> > </span>
                </div>
                <h2 class="item-name">{{ $category->name }}</h2>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <img src="{{ $category->hero_img }}" width="80%">
                </div>
                <div class="col-sm-4">
                    <ul>
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
                </div>
            </div>
        </div>
    </div>
    @include('partials.products_list', ['products', $products])
</main>
@endsection
