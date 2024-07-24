<div class="row">
    <div class="col-xl-3">
        <div class="sidebar">
            <div class="sidebar mb-48">
                <div class="sidebar-block">
                    <div class="filters">
                            <div class="filter-block">
                                <h4 class="mb-24">بحث</h4>
                                <div class="form-group has-search">
                                    <input type="text" class="form-control" placeholder="إبحث عن بعض المنتجات...." wire:model="searQuery" wire:keyup.debounce="filter">
                                    <button type="submit" class="b-unstyle"><i class="fal fa-search"></i></button>
                                </div>
                            </div>
                            <hr>
                            <div class="filter-block">
                                <div class="title mb-32">
                                    <h5>تصنيفات المنتجات</h5>
                                    <i class="far fa-horizontal-rule"></i>
                                </div>
                                <ul class="unstyled list">
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
                                    <h5>العلامات التجارية</h5>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
