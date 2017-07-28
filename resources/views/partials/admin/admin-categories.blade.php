@extends('layouts.app')

@section('body_class', 'default admin-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/css/sortable-theme-bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/js/sortable.min.js"></script>
@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.category')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/category" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="story-title" name="category" placeHolder="Category Name">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group d-none">
                        <input type="file" name="thumb_img" placeHolder="Thumb Image">
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" placeHolder="URL">
                    </div>
                    <div class="form-group">
                        <input type="file" name="hero_img">
                    </div>
                    <div class="form-group">
                        <input type="text" name="parent_id" placeHolder="Parent Category Id">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.category')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.category') @lang('messages.list')</h4>
        <table class="table table-striped sortable-theme-bootstrap" data-sortable>
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.category') @lang('messages.name')</th>
                    <th>@lang('messages.category') @lang('messages.url')</th>
                    <th>@lang('messages.hero') @lang('messages.image')</th>
                    <th>@lang('messages.parent') @lang('messages.id')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>
                        <a href="/admin/category/{{ $category->id }}">{{ $category->name }}</a>
                    </td>
                    <td>
                        {{ $category->url }}
                    </td>
                    <td>
                        {{ $category->hero_img }}
                    </td>
                    <td>
                        {{ $category->parent_id }}
                    </td>
                    <td>
                        <a class="update" href="/admin/category/{{ $category->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/category/{{ $category->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection