<div id="carousel" class="carousel slide" data-ride="carousel" style="height: 60vh;">
  <h2 class="heading text-center pb-3">Our Most Popular Products</h2>
  <div class="carousel-inner" role="listbox">
    @foreach ($carousel as $details)
      <div class="carousel-item">
        <img class="d-block img-fluid col-lg-6" src="{{ $details->image }}" alt="First slide" width="100%">
        <div class="col-lg-6 text-center m-auto">
          <h2 class="pb-3">{{ $details->heading }}</h2>
		  <div>
              <h4 class="pb-2">{{ $details->description }}</h4>
          </div>
          @if($details->link)
              <div><a href="{{ $details->link }}" class="btn btn-primary">{{ $details->action_btn }}</a></div>
          @endif
        </div>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="fa fa-lg fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="fa fa-lg fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script>
	document.getElementsByClassName('carousel-item')[0].classList.add('active');
</script>