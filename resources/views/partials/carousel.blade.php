<!-- <div id="gallery" class="carousel slide" data-ride="carousel">
  <h2 class="heading text-center">Our Most Popular Products</h2>
  <ol class="carousel-indicators">
    <li data-target="#gallery" data-slide-to="0" class="active">
        <img class="d-block img-fluid" src="/img/g_oreo.png" alt="First slide">
    </li>
    <li data-target="#gallery" data-slide-to="1">
        <img class="d-block img-fluid" src="/img/g_bread_rolls.png" alt="Second slide">
    </li>
    <li data-target="#gallery" data-slide-to="2">
        <img class="d-block img-fluid" src="/img/g_cookies.png" alt="Third slide">
    </li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="/img/g_oreo.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="/img/g_bread_rolls.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="/img/g_cookies.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
    <span class="fa fa-lg fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
    <span class="fa fa-lg fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<div id="gallery" class="carousel slide" data-ride="carousel" style="height: 60vh;">
  <h2 class="heading text-center">Our Most Popular Products</h2>
  <!-- <ol class="carousel-indicators">
    <li data-target="#gallery" data-slide-to="0" class="active">
        <img class="d-block img-fluid" src="/img/g_oreo.png" alt="First slide">
    </li>
    <li data-target="#gallery" data-slide-to="1">
        <img class="d-block img-fluid" src="/img/g_bread_rolls.png" alt="Second slide">
    </li>
    <li data-target="#gallery" data-slide-to="2">
        <img class="d-block img-fluid" src="/img/g_cookies.png" alt="Third slide">
    </li>
  </ol> -->
  <div class="carousel-inner" role="listbox">
      @foreach ($galleryConfig as $ff)
          <div class="carousel-item {{$ff['class']}}">
            <img class="d-block img-fluid col-lg-6" src="{{$ff['src']}}" alt="First slide" width="100%">
            <div class="col-lg-6">
                {{$ff['heading']}}
            </div>
          </div>
      @endforeach
      
    <!-- <div class="carousel-item active">
      <img class="d-block img-fluid" src="/img/g_oreo.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="/img/g_bread_rolls.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="/img/g_cookies.png" alt="Third slide">
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
    <span class="fa fa-lg fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
    <span class="fa fa-lg fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>