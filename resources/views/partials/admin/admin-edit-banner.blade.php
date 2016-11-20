@extends('layouts.app')

@section('content')
<div class="container edit-category admin">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update')&nbsp;@lang('messages.banner')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/banner/{{ $data->id }}" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id">@lang('messages.id')</label>
                          <div class="col-sm-10">
                              <div class="form-dummy">{{ $data->id }}</div>
                          </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title_left')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" name="title_left" placeholder="Enter Banner Title" value="{{ $data->title_left }}">
                          <input type="hidden" name="_method" value="PUT">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="title">@lang('messages.title_right')</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" name="title_right" placeholder="Enter Banner Title" value="{{ $data->title_right }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="link">@lang('messages.link')</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="link" placeholder="Enter Banner Link" value="{{ $data->link }}">
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
                       <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-primary" type="submit">@lang('messages.update')&nbsp;@lang('messages.banner')</button>
                       </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
