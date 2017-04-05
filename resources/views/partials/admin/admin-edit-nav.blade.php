@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-category admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.navigation')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/nav/{{ $data->id }}" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id">@lang('messages.id')</label>
                          <div class="col-sm-10">
                              <div class="form-dummy">{{ $data->id }}</div>
                          </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" id="story-title" name="title" placeholder="Enter Navigation Title" value="{{ $data->title }}">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="link">@lang('messages.link')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="link" placeholder="Enter Navigation Link" value="{{ $data->link }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="order">@lang('messages.order')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="order" placeholder="Enter Order No" value="{{ $data->order }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent_id">@lang('messages.parent') @lang('messages.id')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="parent_id" value="{{ $data->parent_id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="created_at">@lang('messages.created_at')</label>
                          <div class="col-sm-10">
                              <div class="form-dummy">{{ $data->created_at }}</div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="updated_at">@lang('messages.updated_at')</label>
                          <div class="col-sm-10">
                              <div class="form-dummy">{{ $data->updated_at }}</div>
                          </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-12">
                          <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.navigation')</button>
                       </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
