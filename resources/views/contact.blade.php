@extends('layouts.app')

@include('partials.meta-tags', ['title' => 'Contact - Patricks Breads', 'ogtype' => 'website', 'ogtitle' => 'Contact - Patricks Breads', 'ogdescription' => 'Contact - Patricks Breads'])

@section('body_class', 'default contact product-page')

@section('content')
<main>
    <div class="container ta-c">
        <h2 class="item-name item-heading-wrapper">Contact</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8 offset-md-2 mt-4 share-btns">
                                @foreach ($contactConfig as $f)
                                    @if (isset($f['url']) && isset($f['title']))
                                        <div class="mb-4">
                                            <a href="{{ $f['url'] }}">
                                                <i class="icon fa {{$f['icon']}}"></i>
                                                {{$f['title']}}
                                            </a>
                                        </div>
                                    @elseif (isset($f['title']))
                                        <div class="mb-4">
                                            <i class="icon fa {{$f['icon']}}"></i>
                                            {{$f['title']}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('partials.feedback_form', ['feedbackConfig' => $feedbackConfig])
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('partials.search_modal')
</main>
@include('partials.copyright')

@endsection
