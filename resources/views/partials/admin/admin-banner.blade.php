@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.banner')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/banner" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title_left')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" name="title_left">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title_right')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" name="title_right">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="link">@lang('messages.link')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="link">
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-12">
                          <button class="btn btn-primary" type="submit">@lang('messages.banner')&nbsp;@lang('messages.create')</button>
                       </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.banner')&nbsp;@lang('messages.list')</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.title_left')</th>
                    <th>@lang('messages.title_right')</th>
                    <th>@lang('messages.link')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $banner)
                <tr>
                    <th>{{ $banner->id }}</th>
                    <td>
                        <a href="/admin/banner/{{ $banner->id }}">{{ $banner->title_left }}</a>
                    </td>
                    <td>
                        <a href="/admin/banner/{{ $banner->id }}">{{ $banner->title_right }}</a>
                    </td>
                    <td>{{ $banner->link }}</td>
                    <td>
                        <a class="update" href="/admin/banner/{{ $banner->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/banner/{{ $banner->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
