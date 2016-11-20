@extends('layouts.app')

@section('content')
<div class="container categories admin">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.navigation') @lang('messages.create')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/nav" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" id="story-title" name="title" placeholder="Enter Navigation Title">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="link">@lang('messages.link')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="link" placeholder="Enter Navigation Link">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="order">@lang('messages.order')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="order" placeholder="Enter Order No">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent_id">@lang('messages.parent') @lang('messages.id')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="parent_id">
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.navigation')</button>
                       </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1 table-responsive">
        <h4>@lang('messages.navigation') @lang('messages.list')</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.title')</th>
                    <th>@lang('messages.link')</th>
                    <th>@lang('messages.order')</th>
                    <th>@lang('messages.parent') @lang('messages.id')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $nav)
                <tr>
                    <th>{{ $nav->id }}</th>
                    <td>
                        <a href="/admin/nav/{{ $nav->id }}">{{ $nav->title }}</a>
                    </td>
                    <td>{{ $nav->link }}</td>
                    <td>{{ $nav->order }}</td>
                    <td>{{ $nav->parent_id }}</td>
                    <td>
                        <a class="update" href="/admin/nav/{{ $nav->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/nav/{{ $nav->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection