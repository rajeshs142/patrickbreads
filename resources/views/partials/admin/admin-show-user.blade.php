@extends('layouts.app')

@section('content')
<div class="container show-category admin">
    <div class="col-md-10 col-md-offset-1">
        <div>
            <h4>@lang('messages.user') id {{ $data->id }} - {{ $data->name }}</h4>
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
                <tr>
                    <th>@lang('messages.email')</th>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <th>@lang('messages.admin')</th>
                    <td>{{ $data->admin }}</td>
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
