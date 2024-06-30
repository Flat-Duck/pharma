<section class="weekly-deals p-40">
    <div class="container">
        <div class="heading mb-40">
            <h3>!! إعلانات تجارية </h3>
        </div>
        <div class="row">
            @foreach ($randomAds as $ad)
                <div class="col-xl-4 offset-xl-0 col-lg-6 offset-lg-3">
                    <div class="deal-right-area">
                        <div class="text-block">
                            <h3 class="mb-16 text-center color-white pt-40">{{ $ad->offer }}</h3>
                            <h5 class="mb-16 text-center color-white">
                                {{ $ad->title }}
                            </h5>
                            <a href="{{ route('shop.products.show', $ad->product) }}"
                                class="cus-btn small invert align-items-center mb-16"><span class="icon"><img
                                        src="{{ asset('assets/media/icons/btn-book.png') }}" alt=""></span><span
                                    class="plain-text">تحصل على العرض</span></a>
                            <p class="text-center color-white mb-24">
                                {{ $ad->body }}
                            </p>
                        </div>
                        <img src="{{ asset('assets/media/books/group-img.png') }}" alt="" class="main-img">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
