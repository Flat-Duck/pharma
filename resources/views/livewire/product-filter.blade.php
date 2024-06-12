<div class="row">
    <div class="col-xl-3">
        <div class="sidebar">
            <div class="sidebar mb-48">
                <div class="sidebar-block">
                    <div class="filters">
                        <form action="https://uiparadox.co.uk/templates/book_store/shop-listing.html">
                            <div class="filter-block">
                                <h4 class="mb-24">Filter</h4>
                                <form method="get"
                                    action="https://uiparadox.co.uk/templates/book_store/shop-listing.html">
                                    <div class="form-group has-search">
                                        <input type="text" class="form-control" placeholder="إبحث عن بعض المنتجات...." wire:model="searQuery" wire:keyup.debounce="filter">
                                        <button type="submit" class="b-unstyle"><i class="fal fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="filter-block">
                                <div class="title mb-32">
                                    <h5>Price Range</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <div class="slider-track">
                                    <div class="d-flex justify-content-between mb-4p">
                                        <h5>$10.00</h5>
                                        <h5>$300</h5>
                                    </div>
                                    <input type="text" wire:change="alreto()" wire:model="price" class="js-slider form-control" value="0">
                                </div>
                            </div>
                            <hr>
                            <div class="filter-block">
                                <div class="title mb-32">
                                    <h5>Books Categories</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <ul class="unstyled list">
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="Bio-graphy">
                                            <label for="Bio-graphy">Biography</label>
                                        </div>
                                        <h6 class="dark-gray">(02)</h6>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li class="mb-16">
                                            <div class="filter-checkbox">
                                                <input type="checkbox" id="category{{ $category->id }}" value="{{ $category->id }}" wire:model.live="selectedCategories">
                                                <label wire:click="filter()" for="category{{ $category->id }}">{{$category->name}}</label>
                                            </div>
                                            <h6 class="dark-gray">({{$category->products_count}})</h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="filter-block">
                                <div class="title mb-32">
                                    <h5>Authors</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <ul class="unstyled list">
                                    @foreach ($brands as $brand)
                                        <li class="mb-16">
                                            <div class="filter-checkbox">
                                                <input type="checkbox" id="brand{{ $brand->id }}" value="{{ $brand->id }}" wire:model.live="selectedBrands">
                                                <label wire:click="filter()" for="brand{{ $brand->id }}">{{$brand->name}}</label>
                                            </div>
                                            <h6 class="dark-gray">({{$brand->products_count}})</h6>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            {{-- <div class="filter-block">
                                <div class="title mb-32">
                                    <h5>Languages</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <ul class="unstyled list">
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="English">
                                            <label for="English">English</label>
                                        </div>
                                        <h6 class="dark-gray">(02)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="Spanish">
                                            <label for="Spanish">Spanish</label>
                                        </div>
                                        <h6 class="dark-gray">(04)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="Chinese">
                                            <label for="Chinese">Chinese</label>
                                        </div>
                                        <h6 class="dark-gray">(06)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="Urdu">
                                            <label for="Urdu">Urdu</label>
                                        </div>
                                        <h6 class="dark-gray">(08)</h6>
                                    </li>
                                    <ul id="more-languages" class="accordion-collapse collapse unstyled list"
                                        data-bs-parent="#accordionExample">
                                        <li class="mb-16">
                                            <div class="filter-checkbox">
                                                <input type="checkbox" id="english">
                                                <label for="english">English</label>
                                            </div>
                                            <h6 class="dark-gray">(02)</h6>
                                        </li>
                                        <li class="mb-16">
                                            <div class="filter-checkbox">
                                                <input type="checkbox" id="spanish">
                                                <label for="spanish">Spanish</label>
                                            </div>
                                            <h6 class="dark-gray">(04)</h6>
                                        </li>
                                        <li class="mb-16">
                                            <div class="filter-checkbox">
                                                <input type="checkbox" id="chinese">
                                                <label for="chinese">Chinese</label>
                                            </div>
                                            <h6 class="dark-gray">(06)</h6>
                                        </li>
                                    </ul>
                                    <a href="#" class="accordion-button load-more-btn"
                                        data-bs-toggle="collapse" data-bs-target="#more-languages"
                                        aria-expanded="true"> Show More</a>
                                </ul>
                            </div> --}}
                            {{-- <hr>
                            <div class="filter-block border-0">
                                <div class="title mb-32">
                                    <h5>Reviews</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <ul class="unstyled list">
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="star-1">
                                            <label for="star-1">
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                            </label>
                                        </div>
                                        <h6 class="dark-gray">(02)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="star-2">
                                            <label for="star-2">
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                            </label>
                                        </div>
                                        <h6 class="dark-gray">(04)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox">
                                            <input type="checkbox" id="star-3">
                                            <label for="star-3">
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                            </label>
                                        </div>
                                        <h6 class="dark-gray">(06)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox align-items-center">
                                            <input type="checkbox" id="star-4">
                                            <label for="star-4">
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                            </label>
                                        </div>
                                        <h6 class="dark-gray">(08)</h6>
                                    </li>
                                    <li class="mb-16">
                                        <div class="filter-checkbox align-items-center">
                                            <input type="checkbox" id="star-5">
                                            <label for="star-5">
                                                <a href="#"><img src="assets/media/icons/fill-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                                <a href="#"><img src="assets/media/icons/empty-star.png"
                                                        alt=""></a>
                                            </label>
                                        </div>
                                        <h6 class="dark-gray">(08)</h6>
                                    </li>
                                </ul>
                            </div>
                            <hr> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
