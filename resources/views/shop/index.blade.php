@extends('layouts.shop.app', ['page' => 'home'])

@section('content')
@if ($adsAva)
<x-random-ad />
@endif
  
  
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
  {{-- <div class="modal fade" id="videoModal" role="dialog" aria-hidden="true">
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
  </div> --}}
  <!-- modal-popup area end  -->

</div>

  @endsection