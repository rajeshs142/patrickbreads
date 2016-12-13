@extends('layouts.app')

@include('partials.meta-tags', ['title' => 'Patricks Breads - Home', 'ogtype' => 'website', 'ogtitle' => 'Patricks Breads', 'ogdescription' => 'Breads, Sweets, Savoury, Beverage, Pantry'])

@section('body_class', 'home hide-header')

@section('content')
<main>
    @include('partials.nav_top')
    @include('partials.hero')
    @include('partials.story')
    @include('partials.parallax')
    @include('partials.categories')
    @include('partials.gallery')
</main>
@endsection