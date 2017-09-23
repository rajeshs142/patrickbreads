<header class="container-fluid p-4 text-white text-center bg-color" id="header">
    @foreach ($cataloguebrands as $brand)
    	<div class="pb-3 fz-12">
    		<span>{{ $brand->banner }}</span>
    	</div>
    	<div class="row">
    		<div class="col-6">
    			<div class="text-center brand-wrapper">
    				<img src="{{ $brand->logo }}" class="brand-text d-inline-block img-fluid">
    			</div>	
    		</div>
    		<div class="col-6 m-auto fz-14">
    			<div>
    				<i class="fa fa-phone align-middle pr-2"></i>
    				<span>{{ $brand->phone_number }}</span>
    			</div>	
    			<div>
    				<i class="fa fa-envelope align-middle pr-2"></i> 
    				<span>{{ $brand->email }}</span>
    			</div>	
    		</div>
    	</div>
    @endforeach
</header>
