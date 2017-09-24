@extends('layouts.catalogue')
@section('content')
    @include('partials.catalogue.header')
    <main class="container-fluid p-3">
    	<div class="row">
            @foreach ($cataloguedetails as $key => $details)
                <?php $price = explode('.', $details->price); ?>
                @if($key == 4)
                <div class="col-4 bd-6 bg-f7f7f7 p-3">
                	<img src="{{ $cobrand_logo }}" class="main-icon">
                </div>
                @endif
    		    <div class="col-4 bd-6 bg-f7f7f7 p-3">
    				<div class="row">
    					<div class="col-7 px-2">
    						<div>
    							<span class="align-top fz-1-8rem">$</span>
    							<h2 class="d-inline-block fz-3rem"><?php echo $price[0]; ?></h2>
    							<span class="align-topi d-inline-block">
    								<div class="fz-1-4rem"><?php echo $price[1]; ?></div>
    								<div class="fz-0-7rem">each</div>
    							</span>
    						</div>
    						<div class="bg-yellow py-2">
    							<b>{{ $details->action_btn }}</b>
    						</div>
    						<div class="text-left fz-0-7rem p-2">
    							<b>{{ $details->title }}</b>
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
    @include('partials.catalogue.footer')
@endsection
