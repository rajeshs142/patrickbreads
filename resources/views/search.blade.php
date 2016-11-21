@extends('layouts.app')

@include('partials.meta-tags', ['title' => $keyword, 'ogtype' => 'search', 'ogtitle' => 'వ్యాఖ్య - '.$keyword.' శోధన ఫలితాలు', 'ogdescription' => $keyword.' శోధన ఫలితాలు'])

@section('body_class', 'default')

@section('content')
<main>
    <section>
        @include('partials.products_list', ['products' => $product, 'productsListStyles' => []])
        <div class="ta-c">
            {{ $product->links() }}
        </div>
    </section>
</main>
@endsection
<!-- appends(['search' => $keyword ])-> -->