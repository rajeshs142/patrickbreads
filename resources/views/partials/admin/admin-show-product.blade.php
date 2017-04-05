@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container show-category admin">
    <div class="col-md-10 offset-md-1">
        <div>
           <h4>@lang('messages.product') {{ $data->id }} - {{ $data->name }}</h4>
        </div>
        <table class="table table-responsive">
            <tbody>
                <tr>
                    <th>@lang('messages.id')</th>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.title')</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.category')</th>
                    <td>{{ $data->category }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.author')</th>
                    <td>{{ $data->username }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.tags')</th>
                    <td>{{ $data->tags }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.created_at')</th>
                    <td>{{ $data->created_at }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.updated_at')</th>
                    <td>{{ $data->updated_at }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.content')</th>
                    <td>{{ $data->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
