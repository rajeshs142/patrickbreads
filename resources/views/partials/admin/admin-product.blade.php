@extends('layouts.app')

@section('body_class', 'default admin-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/css/sortable-theme-bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/js/sortable.min.js"></script>
@section('content')
<div class="container-fluid product admin stories">
    <div class="col-md-10 offset-md-1">
        <div>
            <h4 class="d-ib">@lang('messages.product') @lang('messages.list')</h4>
            <a class="btn btn-primary add-story" href="/admin/product/create">@lang('messages.create') @lang('messages.product')</a>
        </div>
        <div>
            <form role="search" method="GET" action="product" class="form-inline search-form">
                <div class="form-group">
                    <input name="search" type="text" class="form-control" placeholder="@lang('messages.search')">
                </div>
                <button type="submit" class="btn btn-default">@lang('messages.search')</button>
            </form>
        </div>
        <table class="table table-striped table-responsive sortable-theme-bootstrap" data-sortable>
            <thead>
                <tr>
                    <th>#</a></th>
                    <th>@lang('messages.name')</th>
                    <th>@lang('messages.category')</th>
                    <th>@lang('messages.dimensions')</th>
                    <th>@lang('messages.serving_size')</th>
                    <th>@lang('messages.shelf_life')</th>
                    <th>@lang('messages.storage')</th>
                    <th>@lang('messages.author')</th>
                    <th>@lang('messages.tags')</th>
                    <th>@lang('messages.updated_at')</th>
                    <th>@lang('messages.action')</th>
                    <!-- <th><a href="?sort=id">#</a></th>
                    <th><a href="?sort=name">@lang('messages.name')</a></th>
                    <th><a href="?sort=category_id">@lang('messages.category')</a></th>
                    <th><a href="?sort=user_id">@lang('messages.author')</a></th>
                    <th><a href="?sort=tags">@lang('messages.tags')</a></th>
                    <th><a href="?sort=created_at">@lang('messages.updated_at')</a></th>
                    <th>@lang('messages.action')</th> -->
                </tr>
            </thead>
            <tbody>
              @foreach($data as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <td>
                        <a href="product/{{ $product->id }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->dimensions }}</td>
                    <td>{{ $product->serving_size }}</td>
                    <td>{{ $product->shelf_life }}</td>
                    <td>{{ $product->storage }}</td>
                    <td>{{ $product->username }}</td>
                    <td>{{ $product->tags }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a class="update" href="/admin/product/{{ $product->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/product/{{ $product->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
