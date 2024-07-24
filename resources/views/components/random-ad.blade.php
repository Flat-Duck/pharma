<div class="hero-banner-3 bg-lightest-gray mb-5">
    <div class="container">
        <div class="row">
          <h1 class="mb-12 text-center">عروضنا</h1>
        </div>
        
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <div class="text-block">
                <h1 class="mb-12">{{ $randomAd->offer }}</h1>
                <h5>{{ $randomAd->title }}</h5>
                <p class="dark-gray">
                    {{ $randomAd->body }}
                </p>
                <h6>
                    @if (!is_null($randomAd->product))
                        <a href="{{ route('shop.products.show', ['product'=>$randomAd->product]) }}" class="cus-btn small m-auto">
                            <span class="icon">
                                <img src="{{ asset("assets/media/icons/click-button.png") }}" alt="">
                            </span>تحصل على العرض
                        </a>
                    @endif
                </h6>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <div class="images-row">
                <img src="{{ asset($randomAd->image) }}" style="max-height: 320px;width: 400px;" class="blog-img big" alt="">
              </div>
            </div>
        </div>
    </div>
</div>
