@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-category admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.category')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/category/{{ $data->id }}">
                    <table class="table table-responsive">
                        <tbody>
                            <tr class="form-group">
                                <th>@lang('messages.id')</th>
                                <td>{{ $data->id }}</td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.name')</th>
                                <td>
                                    <input type="text" id="story-title" name="category" placeholder="Enter Category Name" value="{{ $data->name }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </td>
                            </tr>
                            <tr class="form-group d-none">
                                <th>@lang('messages.thumb') @lang('messages.image')</th>
                                <td>
                                    <input type="text" name="thumb_img" placeholder="Thumb Image" value="{{ $data->thumb_img }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.url')</th>
                                <td>
                                    <input type="text" name="url" placeholder="Url" value="{{ $data->url }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.hero') @lang('messages.image')</th>
                                <td>
                                    <input type="file" name="hero_img" value="{{ $data->hero_img }}">{{ $data->hero_img }}
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.parent') @lang('messages.id')</th>
                                <td>
                                    <input type="text" name="parent_id" placeholder="Parent Category Id" value="{{ $data->parent_id }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.created_at')</th>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.updated_at')</th>
                                <td>{{ $data->updated_at }}</td>
                            </tr>
                            <tr class="form-group">
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.category')</button>
                                </td>
                            </tr>
                        </tbody>
                  </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
