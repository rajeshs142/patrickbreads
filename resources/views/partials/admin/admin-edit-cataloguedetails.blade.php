@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-cataloguedetails admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.cataloguedetails')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/cataloguedetails/{{ $data->id }}" enctype="multipart/form-data">
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
                                <th>@lang('messages.brand_id')</th>
                                <td>
                                    <input type="text" name="brand_id" placeholder="Brand Id" value="{{ $data->brand_id }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.price')</th>
                                <td>
                                    <input type="text" name="price" placeholder="price" value="{{ $data->price }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.image')</th>
                                <td>
                                    <input type="file" name="image" placeholder="Image" value="{{ $data->image }}">
                                    <div>{{ $data->image }}</div>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.title')</th>
                                <td>
                                    <input type="text" name="title" placeholder="Title" value="{{ $data->title }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.weight')</th>
                                <td>
                                    <input type="text" name="weight" placeholder="Weight" value="{{ $data->weight }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.packsize')</th>
                                <td>
                                    <input type="text" name="packsize" placeholder="Pack Size" value="{{ $data->packsize }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.action_btn')</th>
                                <td>
                                    <input type="text" name="action_btn" placeholder="Discount" value="{{ $data->action_btn }}">
                                </td>
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
                                    <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.cataloguedetails')</button>
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
