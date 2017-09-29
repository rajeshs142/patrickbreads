<section class="footer text-center text-white bg-color fz-12 py-3">
     @foreach ($cataloguebrands as $brand)
	    <div>{{ $brand->footertext1 }}</div>
	    <div>{{ $brand->footertext2 }}</div>
    @endforeach
</section>
