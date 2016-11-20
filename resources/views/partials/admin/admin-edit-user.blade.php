@extends('layouts.app')

@section('content')
<div class="container edit-story admin">
    <div class="col-md-10 col-md-offset-1 table-responsive">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.user')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/users/{{ $user->id }}" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">@lang('messages.name')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">@lang('messages.email')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="admin">@lang('messages.admin')</label>
                        <div class="col-sm-10">
                            @if ($user->admin == 1)
                                <input type="checkbox" class="form-control" name="admin" checked>                                
                            @else
                                <input type="checkbox" class="form-control" name="admin">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="created_at">@lang('messages.created_at')</label>
                        <div class="col-sm-10">
                            <div class="form-dummy">{{ $user->created_at }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="updated_at">@lang('messages.updated_at')</label>
                        <div class="col-sm-10">
                            <div class="form-dummy">{{ $user->updated_at }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.user')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
