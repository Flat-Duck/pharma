<section class="weekly-deals-2 pt-40">
    <div class="container">
        <div class="heading">
            <h3>!! إعلانات تجارية </h3>
        </div>
        <div class="weekly-deals-slider mt-40">
            @foreach ($randomAds as $ad)
                <div class="week-deal-card">
                    <div class="img-box">
                        <img src="{{ asset($ad->image) }}" alt="">
                    </div>
                    <div class="content-box">
                        <div class="price-row mb-16">
                            <h5>{{ $ad->offer }}</h5>
                        </div>
                        <a href="{{ route('shop.products.show', $ad->product) }}">
                            <h5 class="mb-16">
                                {{ $ad->title }}
                            </h5>
                            <p>
                                {{ $ad->body }}
                            </p>

                        </a>
                        <h6>
                            <a href="{{ route('shop.products.show', $ad->product) }}" class="cus-btn small m-auto">
                                <span class="icon">
                                    <img src="{{ asset("assets/media/icons/click-button.png") }}" alt="">
                                </span>تحصل على العرض
                            </a>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
