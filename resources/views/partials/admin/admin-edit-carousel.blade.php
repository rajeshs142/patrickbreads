@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-carousel admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.carousel')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/carousel/{{ $data->id }}" enctype="multipart/form-data">
                    <table class="table table-responsive">
                        <tbody>
                            <tr class="form-group">
                                <th>@lang('messages.id')</th>
                                <td>{{ $data->id }}</td>
                                <td>
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.heading')</th>
                                <td>
                                    <input type="text" name="heading" placeholder="Description" value="{{ $data->heading }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.image')</th>
                                <td>
                                    <input type="file" name="image" placeholder="Image" value="{{ $data->image }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.link')</th>
                                <td>
                                    <input type="text" name="link" placeholder="Link" value="{{ $data->link }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.description')</th>
								<td>
									<textarea type="text" class="form-control" name="description" placeholder="Description" rows="8" value="{{ $data->description }}"></textarea>
								</td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.action_btn')</th>
								<td>
									<input type="text" name="action_btn" placeholder="Action button" value="{{ $data->action_btn }}">
								</td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.created_at')</th>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.updated_at')</th>
                                <td>{{ $data->updated_at }}</td>
                            </tr>
                            <tr class="form-group">
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.carousel')</button>
                                </td>
                            </tr>
                        </tbody>
                  </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
