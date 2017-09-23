@extends('layouts.catalogue')
@section('content')
    @include('partials.catalogue.header')
    <main class="container-fluid p-3">
    	<div class="row">
            @foreach ($cataloguedetails as $key => $details)
                @if($key == 4)
                <div class="col-4 bd-6 bg-f7f7f7 p-3">
                	<img src="{{ $cobrand_logo }}" class="main-icon">
                </div>
                @endif
    		    <div class="col-4 bd-6 bg-f7f7f7 p-3">
    				<div class="row">
    					<div class="col-7 px-2">
    						<div>
                                <?php
                                    $new_array = array();
                                    if($details->price) {
                                    $new_array = explode('.',$details->price);
                                    }
                                ?>
                                @if (is_array($new_array) && count($new_array) > 0)
                                    <span class="align-top fz-1-8rem">$</span>
                                    <h2 class="d-inline-block fz-3rem">{{ $new_array[0] }}</h2>
                                    <span class="align-topi d-inline-block">
                                        <div class="fz-1-4rem">{{$new_array[1]}}</div>
                                        <div class="fz-0-7rem">each</div>
                                    </span>
                                @endif
    						</div>
                            @if($details->action_btn)
        						<div class="bg-yellow py-2">
                                    <b>{{ $details->action_btn }}</b>
        						</div>
                            @endif
    						<div class="text-left fz-0-7rem p-2">
                                <b class="fz-14">{{ $details->title }}</b>
    							<div>{{ $details->weight }}</div>
    							<div>{{ $details->packsize }}</div>
    				        </div>
    			        </div>
    				    <div class="col-5 p-0">
    					    <img src="{{ $details->image }}">
    				    </div>
    			    </div>
    	        </div>
            @endforeach
        </div>
    </main>
    <style>
        header, footer {
            background: {{ $background_color }};
           	background: url('{{ $background_image }}');
       }
    </style>
    @include('partials.catalogue.footer')
@endsection
        
