@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container show-category admin">
    <div class="col-md-10 offset-md-1">
        <div>
            <h4>@lang('messages.banner') {{ $data->id }} - {{ $data->title_left }}</h4>
        </div>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <th>@lang('messages.id')</th>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.title_left')</th>
                    <td>{{ $data->title_left }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.title_right')</th>
                    <td>{{ $data->title_right }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.link')</th>
                    <td>{{ $data->link }}</td>
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
