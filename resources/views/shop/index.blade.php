@extends('layouts.shop.app', ['page' => 'home'])

@section('content')
<div class="hero-banner-3 bg-lightest-gray">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Shop Listing</h1>
              <p class="dark-gray">Lorem ipsum dolor sit amet consectetur. Sed <br> elementum ac nulla elementum amet orci. Interdum.</p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
            <div class="images-row">
              <img src="assets/media/banner/banner2-2.png" class="blog-img" alt="" >
              <img src="assets/media/banner/banner2-3.png" class="blog-img big" alt="">
              <img src="assets/media/banner/banner2-1.png" class="blog-img" alt="" >
            </div>
          </div>
      </div>
  </div>
</div>
<!-- Banner-3 End-->
  
  
<!-- Main Content Start -->
<div class="page-content">
  <section>
    <div class="container">
      @livewire('product-filter')
      @livewire('products-area')
    </div>
  </section>
</div>
<!-- Main Content End -->

<!-- Newsletter Start -->

<!-- Newsletter End -->
<!-- Footer Start -->

<!-- Footer Area End  -->

  <!-- modal-popup area start  -->
  <div class="modal fade" id="videoModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="top_bar">
                  <h4 class="modal-title">Demon Slayer Season 4</h4>
                  <button type="button" class="close" id="closeVideoModalButton" data-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true"><i class="fas fa-times"></i> <b>Close</b></span>
                  </button>
              </div>
              <div class="modal-body">
                  <video controls title="Video">
                      <source src="assets/media/video/movie-video.html" type="video/mp4">
                  </video>
              </div>
          </div>
      </div>
  </div>
  <!-- modal-popup area end  -->

</div>

  @endsection