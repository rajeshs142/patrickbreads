@extends('layouts.app')

@section('body_class', 'default admin-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/css/sortable-theme-bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/js/sortable.min.js"></script>
@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.cataloguebrands')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/cataloguebrands" enctype="multipart/form-data">
                    <table class="table table-responsive">
                        <tbody>
                            <tr class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </td>
                            </tr>
                            <tr class="form-group <?php if($errors->first('banner')) echo 'error'; ?>">
                                <th>@lang('messages.banner')</th>
                                <td>
                                    <input type="text" name="banner" placeholder="Banner" >
                                </td>
                            </tr>
                            <tr class="form-group <?php if($errors->first('logo')) echo 'error'; ?>">
                                <th>@lang('messages.logo')</th>
                                <td>
                                    <input type="file" name="logo" placeholder="Logo" >
                                </td>
                            </tr>
                            <tr class="form-group <?php if($errors->first('email')) echo 'error'; ?>">
                                <th>@lang('messages.email')</th>
                                <td>
                                    <input type="text" name="email" placeholder="email" >
                                </td>
                            </tr>
                            <tr class="form-group ">
                                <th>@lang('messages.phone_number')</th>
                                <td>
                                    <input type="text" name="phone_number" placeholder="Phone number" >
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.website')</th>
                                <td>
                                    <input type="text" name="website" placeholder="Description" >
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.background_image')</th>
                                <td>
                                    <input type="file" name="background_image" placeholder="Background image">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.background_color')</th>
                                <td>
                                    <input type="text" name="background_color" placeholder="Background color">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.footertext1')</th>
                                <td>
                                    <textarea type="text" name="footertext1" placeholder="Footer Text1" rows"5"></textarea>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.footertext2')</th>
                                <td>
                                    <textarea type="text" name="footertext2" placeholder="Footer Text2" rows"4"></textarea>
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.no_of_products')</th>
                                <td>
                                    <input type="text" name="no_of_products" placeholder="No of Products">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <th>@lang('messages.cobrand_logo')</th>
                                <td>
                                    <input type="file" name="cobrand_logo" placeholder="Cobrand logo">
                                </td>
                            </tr>
                            <tr class="form-group">
                                <td>
                                    <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.cataloguebrands')</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.cataloguebrands') @lang('messages.list')</h4>
        <table class="table table-striped sortable-theme-bootstrap" data-sortable>
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.logo')</th>
                    <th>@lang('messages.email')</th>
                    <th>@lang('messages.phone_number')</th>
                    <th>@lang('messages.website')</th>
                    <th>@lang('messages.background_image')</th>
                    <th>@lang('messages.background_color')</th>
                    <th>@lang('messages.footertext1')</th>
                    <th>@lang('messages.footertext2')</th>
                    <th>@lang('messages.no_of_products')</th>
					<th>@lang('messages.cobrand_logo')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $cataloguebrands)
                <tr>
                    <th>{{ $cataloguebrands->id }}</th>
                    <td>
                        {{ $cataloguebrands->logo }}
                    </td>
                    <td>
                        {{ $cataloguebrands->email }}
                    </td>
                    <td>
                        {{ $cataloguebrands->phone_number }}
                    </td>
                    <td>
                        {{ $cataloguebrands->website }}
                    </td>
                    <td>
                        {{ $cataloguebrands->background_image }}
                    </td>
                    <td>
                        {{ $cataloguebrands->background_color }}
                    </td>
                    <td>
                        {{ $cataloguebrands->footertext1 }}
                    </td>
                    <td>
                        {{ $cataloguebrands->footertext2 }}
                    </td>
                    <td>
                        {{ $cataloguebrands->no_of_products }}
                    </td>
                    <td>
                        {{ $cataloguebrands->cobrand_logo }}
                    </td>
                    <td>
                        <a class="update" href="/admin/cataloguebrands/{{ $cataloguebrands->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/cataloguebrands/{{ $cataloguebrands->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection