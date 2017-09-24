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
                    @if(isset($errors))
                        @foreach($errors->all() as $error)
                        <div class="text-danger">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="title" placeHolder="Item Title" class="p-2" value="{{  old('title') }}"><span class="pl-2 text-danger">*</span>
                    </div>
                    <div class="form-group">
                        <span>Item Image</span><span class="pl-2 text-danger">*</span>
                        <input type="file" name="image" placeHolder="Image" class="p-2" value="{{  old('image') }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="price" placeHolder="Item Price" class="p-2" value="{{  old('price') }}"><span class="pl-2 text-danger">*</span>
                    </div>
                    <div class="form-group ">
                        <input type="text" name="weight" placeHolder="Item Weight" class="p-2" value="{{  old('weight') }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="packsize" placeHolder="Item Pack size" class="p-2" value="{{  old('packsize') }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="action_btn" placeHolder="Item Discount" class="p-2" value="{{  old('action_btn') }}">
                    </div>
                    <div class="form-group ">
                        <input type="text" name="brand_id" placeHolder="Brand ID" class="p-2" value="{{  old('brand_id') }}">
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
                    <th>@lang('messages.title')</th>
                    <th>@lang('messages.image')</th>
                    <th>@lang('messages.price')</th>
                    <th>@lang('messages.weight')</th>
                    <th>@lang('messages.pack_size')</th>
                    <th>@lang('messages.action_btn')</th>
                    <th>@lang('messages.brand_id')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $cataloguedetails)
                <tr>
                    <th>{{ $cataloguedetails->id }}</th>
                    <td>
                        {{ $cataloguedetails->title }}
                    </td>
                    <td>
                        {{ $cataloguedetails->image }}
                    </td>
                    <td>
                        {{ $cataloguedetails->price }}
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
                        {{ $cataloguedetails->brand_id }}
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