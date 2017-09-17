@extends('layouts.app')

@section('body_class', 'default admin-page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/css/sortable-theme-bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/0.8.0/js/sortable.min.js"></script>
@section('content')
<div class="container categories admin">
    <div class="col-md-10 offset-md-1">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.carousel')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/carousel" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="heading" placeHolder="Heading">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" placeHolder="Image">
                    </div>
                    <div class="form-group">
                        <input type="text" name="link" placeHolder="Link">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" placeHolder="Description">
                    </div>
                    <div class="form-group">
                        <input type="text" name="action_btn" placeHolder="Action button">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">@lang('messages.create') @lang('messages.carousel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1 table-responsive">
        <h4>@lang('messages.category') @lang('messages.list')</h4>
        <table class="table table-striped sortable-theme-bootstrap" data-sortable>
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('messages.carousel') @lang('messages.image')</th>
                    <th>@lang('messages.heading')</th> 					<th>@lang('messages.description')</th>
                    <th>@lang('messages.action_btn')</th>
					<th>@lang('messages.link')</th>
                    <th>@lang('messages.action')</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $carousal)
                <tr>
                    <th>{{ $carousal->id }}</th>
                    <td>
                        {{ $carousal->image }}
                    </td>
                    <td>
                        {{ $carousal->heading }}
                    </td>
                    <td>
                        {{ $carousal->description }}
                    </td>
                    <td>
                        {{ $carousal->action_btn }}
                    </td>
                    <td>
                        {{ $carousal->link }}
                    </td>
                    <td>
                        <a class="update" href="/admin/carousel/{{ $carousal->id }}/edit">@lang('messages.update')</a>
                        <a href="/admin/carousel/{{ $carousal->id }}" data-method="delete" data-token="{{csrf_token()}}">@lang('messages.delete')</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection