@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-cataloguebrands admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.cataloguebrands')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/cataloguebrands/{{ $data->id }}" enctype="multipart/form-data">
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
                                <th>@lang('messages.banner')</th>
                                <td>
                                    <input type="text" name="banner" placeholder="Banner" value="{{ $data->banner }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.logo')</th>
                                <td>
                                    <input type="file" name="logo" placeholder="Logo" value="{{ $data->logo }}">
                                    <div>{{ $data->logo }}</div>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.email')</th>
                                <td>
                                    <input type="text" name="heading" placeholder="email" value="{{ $data->email }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.phone_number')</th>
                                <td>
                                    <input type="text" name="phone_number" placeholder="Phone number" value="{{ $data->phone_number }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.website')</th>
                                <td>
                                    <input type="text" name="website" placeholder="Description" value="{{ $data->website }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.background_image')</th>
                                <td>
                                    <input type="file" name="background_image" placeholder="Background image" value="{{ $data->background_image }}">
                                    <div>{{ $data->background_image }}</div>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.background_color')</th>
                                <td>
                                    <input type="text" name="background_color" placeholder="Background color" value="{{ $data->background_color }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.footertext1')</th>
                                <td>
                                    <input type="text" name="footertext1" placeholder="Footer Text1" value="{{ $data->footertext1 }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.footertext2')</th>
                                <td>
                                    <input type="text" name="footertext2" placeholder="Footer Text2" value="{{ $data->footertext2 }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.no_of_products')</th>
                                <td>
                                    <input type="text" name="no_of_products" placeholder="No of Products" value="{{ $data->no_of_products }}">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.cobrand_logo')</th>
                                <td>
                                    <input type="file" name="cobrand_logo" placeholder="Cobrand logo" value="{{ $data->cobrand_logo }}">
                                    <div>{{ $data->cobrand_logo }}</div>
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
                                    <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.cataloguebrands')</button>
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
