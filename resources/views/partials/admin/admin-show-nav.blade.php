@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container show-category admin">
    <div class="col-md-10 offset-md-1">
        <div>
            <h4>@lang('messages.navigation') {{ $data->id }} - {{ $data->title }}</h4>
        </div>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <th>@lang('messages.id')</th>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.title')</th>
                    <td>{{ $data->title }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.link')</th>
                    <td>{{ $data->link }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.order')</th>
                    <td>{{ $data->order }}</td>
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
