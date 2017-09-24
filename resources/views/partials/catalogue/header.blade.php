<header class="container-fluid p-4 text-white text-center bg-color" id="header">
    @foreach ($cataloguebrands as $brand)
        @if(!empty($brand->banner))
    	<div class="pb-3 fz-12">
    		<span>{{ $brand->banner }}</span>
    	</div>
        @endif
    	<div class="row">
    		<div class="col-6">
    			<div class="text-center brand-wrapper">
    				<img src="{{ $brand->logo }}" class="brand-text d-inline-block img-fluid">
    			</div>	
    		</div>
    		<div class="col-6 m-auto fz-14">
                @if(!empty($brand->phone_number))
    			<div>
    				<i class="fa fa-phone align-middle pr-2"></i>
    				<span>{{ $brand->phone_number }}</span>
    			</div>
                @endif
                @if(!empty($brand->email))
    			<div>
    				<i class="fa fa-envelope align-middle pr-2"></i> 
    				<span>{{ $brand->email }}</span>
    			</div>
                @endif
    		</div>
    	</div>
    @endforeach
</header>
