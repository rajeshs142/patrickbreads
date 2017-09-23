@extends('layouts.app')

@section('body_class', 'default admin-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/css/sortable-theme-bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/js/sortable.min.js"></script>
@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.cataloguedetails')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/cataloguedetails" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="brand_id" placeHolder="Brand ID">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" placeHolder="Image">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="price" placeHolder="Price">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="title" placeHolder="Title">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="weight" placeHolder="Weight">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="packsize" placeHolder="Packsize">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="action_btn" placeHolder="Discount">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.cataloguedetails')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.cataloguedetails') @lang('messages.list')</h4>
        <table class="table table-striped sortable-theme-bootstrap" data-sortable>
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.brand_id')</th>
                    <th>@lang('messages.price')</th>
                    <th>@lang('messages.image')</th>
                    <th>@lang('messages.title')</th>
                    <th>@lang('messages.weight')</th>
                    <th>@lang('messages.packsize')</th>
                    <th>@lang('messages.action_btn')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $cataloguedetails)
                <tr>
                    <th>{{ $cataloguedetails->id }}</th>
                    <td>
                        {{ $cataloguedetails->brand_id }}
                    </td>
                    <td>
                        {{ $cataloguedetails->price }}
                    </td>
                    <td>
                        {{ $cataloguedetails->image }}
                    </td>
                    <td>
                        {{ $cataloguedetails->title }}
                    </td>
                    <td>
                        {{ $cataloguedetails->weight }}
                    </td>
                    <td>
                        {{ $cataloguedetails->packsize }}
                    </td>
                    <td>
                        {{ $cataloguedetails->action_btn }}
                    </td>
                    <td>
                        <a class="update" href="/admin/cataloguedetails/{{ $cataloguedetails->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/cataloguedetails/{{ $cataloguedetails->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection