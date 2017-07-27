@extends('layouts.app')

@section('body_class', 'default admin-page')

@section('content')
<div class="container edit-story stories admin">
    <div class="col-md-10 offset-md-1 table-responsive">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('messages.update') @lang('messages.product')</div>
            <div class="panel-body">
                <form method="POST" action="/admin/product/{{ $product->id }}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">@lang('messages.title')</label>
                        <div class="col-sm-10">
                            <input  id="story-title" class="form-control" type="text" name="name" placeholder="Enter Title" value="{{ $product->name }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="content">@lang('messages.description')</label>
                        <div class="col-sm-10">
                            <textarea id="desc" class="form-control" name="description" placeholder="Enter Description">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="content">@lang('messages.short_description')</label>
                        <div class="col-sm-10">
                            <textarea id="short-desc" class="form-control" name="short_description" placeholder="Enter Short Description">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="content">@lang('messages.ingredients')</label>
                        <div class="col-sm-10">
                            <textarea id="short-desc" class="form-control" name="ingredients" placeholder="Enter Ingredients">{{ $product->ingredients }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category">@lang('messages.category')</label>
                        <div class="col-sm-10">
                            <select name="category" class="form-control">
                              @foreach($category as $category)
                                  @if ($category->id == $product->category_id)
                                      <option value='{{ $category->id }}' selected>{{ $category->category }}</option>
                                  @else
                                      <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category">@lang('messages.sub_category')</label>
                        <div class="col-sm-10">
                            <select name="sub_category" class="form-control">
                              @foreach($sub_category as $category)
                                  @if ($category->id == $product->sub_category_id)
                                      <option value='{{ $category->id }}' selected>{{ $category->category }}</option>
                                  @else
                                      <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="category">@lang('messages.sub_category2')</label>
                        <div class="col-sm-10">
                            <select name="sub_category2" class="form-control">
                              @foreach($sub_category2 as $category)
                                  @if ($category->id == $product->sub_category2_id)
                                      <option value='{{ $category->id }}' selected>{{ $category->category }}</option>
                                  @else
                                      <option value='{{ $category->id }}'>{{ $category->category }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="image_url">@lang('messages.image_url')</label>
                        <div class="col-sm-10">
                            <input id="image-url" class="form-control" type="file" name="image_url" value="{{ $product->image_url }}">{{ $product->image_url }}
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="thumb_url">@lang('messages.thumb_url')</label>
                        <div class="col-sm-10">
                            <input id="thumb_url" class="form-control" type="file" name="thumb_url" value="{{ $product->thumb_url }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="code">@lang('messages.product_code')</label>
                        <div class="col-sm-10">
                            <input id="code" class="form-control" type="text" name="code" placeholder="Enter Product Code" value="{{ $product->code }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="color">@lang('messages.color')</label>
                        <div class="col-sm-10">
                            <input id="color" class="form-control" type="text" name="color" placeholder="Enter Color" value="{{ $product->color }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="title">@lang('messages.texture')</label>
                        <div class="col-sm-10">
                            <input id="texture" class="form-control" type="text" name="texture" placeholder="Enter Texture" value="{{ $product->texture }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="size">@lang('messages.size')</label>
                        <div class="col-sm-10">
                            <input id="size" class="form-control" type="text" name="size" placeholder="Enter size" value="{{ $product->size }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="pack_size">@lang('messages.pack_size')</label>
                        <div class="col-sm-10">
                            <input id="pack_size" class="form-control" type="text" name="pack_size" placeholder="Enter pack size" value="{{ $product->pack_size }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="unit_weight">@lang('messages.unit_weight')</label>
                        <div class="col-sm-10">
                            <input id="unit_weight" class="form-control" type="text" name="unit_weight" placeholder="Enter unit weight" value="{{ $product->unit_weight }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="case_weight">@lang('messages.case_weight')</label>
                        <div class="col-sm-10">
                            <input id="story-title" class="form-control" type="text" name="case_weight" placeholder="Enter case weight" value="{{ $product->case_weight }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="dimensions">@lang('messages.dimensions')</label>
                        <div class="col-sm-10">
                            <input id="dimensions" class="form-control" type="text" name="dimensions" placeholder="Enter dimensions" value="{{ $product->dimensions }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="serving_size">@lang('messages.serving_size')</label>
                        <div class="col-sm-10">
                            <input id="serving_size" class="form-control" type="text" name="serving_size" placeholder="Enter serving size" value="{{ $product->serving_size }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="shelf_life">@lang('messages.shelf_life')</label>
                        <div class="col-sm-10">
                            <input id="story-title" class="form-control" type="text" name="shelf_life" placeholder="Enter shelf life" value="{{ $product->shelf_life }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="storage">@lang('messages.storage')</label>
                        <div class="col-sm-10">
                            <input id="storage" class="form-control" type="text" name="storage" placeholder="Enter storage" value="{{ $product->storage }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="energy">@lang('messages.energy')</label>
                        <div class="col-sm-10">
                            <input id="energy" class="form-control" type="text" name="energy" placeholder="Enter energy" value="{{ $product->energy }}">
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label class="col-sm-2 control-label" for="allergens">@lang('messages.allergens')</label>
                        <div class="col-sm-10">
                            <input id="allergens" class="form-control" type="text" name="allergens" placeholder="Enter allergens" value="{{ $product->allergens }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tags">@lang('messages.tags')</label>
                        <div class="col-sm-10">
                            <input id="tags" class="form-control" type="text" name="tags" placeholder="Enter tags" value="{{ $product->tags }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="author">@lang('messages.author')</label>
                        <div class="col-sm-10">
                            <select name="author" class="form-control">
                              @foreach($users as $user)
                                <option value='{{ $user->id }}'>{{ $user->username }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category">@lang('messages.created_at')</label>
                        <div class="col-sm-10">
                            <div class="form-dummy">{{ $product->created_at }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category">@lang('messages.updated_at')</label>
                        <div class="col-sm-10">
                            <div class="form-dummy">{{ $product->updated_at }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit">@lang('messages.update') @lang('messages.product')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
