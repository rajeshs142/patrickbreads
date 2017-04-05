@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container admin">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('messages.admin')</div>

                <div class="panel-body">
                    <ul class="container-fluid">
                        <li><a href="/admin/users">@lang('messages.users')</a></li>
                        <li><a href="/admin/product">@lang('messages.products')</a></li>
                        <li><a href="/admin/category">@lang('messages.categories')</a></li>
                        <li><a href="/admin/nav">@lang('messages.navigation')</a></li>
                        <li><a href="/admin/banner">@lang('messages.banner')</a></li>
                        <br />
                        <li><a href="/logout">@lang('messages.logout')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
