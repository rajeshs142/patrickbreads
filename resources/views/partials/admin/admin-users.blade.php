@extends('layouts.app')

@section('content')
<div class="container stories admin">
    <div class="col-md-10 col-md-offset-1">
        <div>
            <h4 class="d-ib">@lang('messages.users') @lang('messages.list')</h4>
        </div>
        <div>
            <form role="search" method="GET" action="users" class="form-inline search-form">
                <div class="form-group">
                    <input name="search" type="text" class="form-control" placeholder="@lang('messages.search')">
                </div>
                <button type="submit" class="btn btn-default">@lang('messages.search')</button>
            </form>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th><a href="?sort=id">#</a></th>
                    <th><a href="?sort=name">@lang('messages.name')</a></th>
                    <th><a href="?sort=email">@lang('messages.email')</a></th>
                    <th><a href="?sort=admin">@lang('messages.admin')</a></th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>
                        <a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->admin }}</td>
                    <td>
                        <a class="update" href="/admin/users/{{ $user->id }}/edit">@lang('messages.update')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
