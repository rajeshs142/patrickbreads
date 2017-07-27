@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container show-category admin">
    <div class="col-md-10 offset-md-1">
        <div>
            <h4>@lang('messages.category') {{ $data->id }} - {{ $data->name }}</h4>
        </div>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <th>@lang('messages.id')</th>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.name')</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr class="d-none">
                    <th>@lang('messages.thumb') @lang('messages.image')</th>
                    <td>{{ $data->thumb_img }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.name')</th>
                    <td>{{ $data->url }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.hero') @lang('messages.image')</th>
                    <td>{{ $data->hero_img }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.parent') @lang('messages.id')</th>
                    <td>{{ $data->parent_id }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.created_at')</th>
                    <td>{{ $data->created_at }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.updated_at')</th>
                    <td>{{ $data->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
