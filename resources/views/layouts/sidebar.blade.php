<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item  {{ $page == 'dashboard'? 'active':''  }}">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="nav-link-title">
                                    الرئيسية
                                </span>
                            </a>
                        </li>
                    <li class="nav-item  {{ $page == 'stats'? 'active':''  }}">
                            <a class="nav-link" href="{{ route('stats') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-chart"></i>
                                </span>
                                <span class="nav-link-title">
                                    الاحصائيات
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\Brand::class)
                                <li class="nav-item {{ $page == 'brands'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('brands.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Brands -->
                                            <i class="ti ti-badge-tm"></i>
                                            <!-- Brands Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            العلامات التجارية
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('view-any', App\Models\Cart::class)
                                <li class="nav-item {{ $page == 'carts'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('carts.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Carts -->
                                            <!-- Carts Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            السلات
                                        </span>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('view-any', App\Models\Category::class)
                                <li class="nav-item {{ $page == 'categories'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('categories.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Categories -->
                                            <i class="ti ti-category"></i>
                                            <!-- Categories Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            التصنيفات
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Order::class)
                                <li class="nav-item {{ $page == 'orders'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('orders.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Orders -->
                                            <i class="ti ti-truck-delivery"></i>
                                            <!-- Orders Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            الطلبيات
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            
                                <li class="nav-item {{ $page == 'chat'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('chats') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Orders -->
                                            <i class="ti ti-brand-hipchat"></i>
                                            <!-- Orders Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            المحادثات
                                        </span>
                                    </a>
                                </li>
                            
                            @can('view-any', App\Models\Product::class)
                                <li class="nav-item {{ $page == 'products'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('products.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Products -->
                                            <i class="ti ti-brand-tidal"></i>
                                            <!-- Products Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            المنتجات
                                        </span>
                                    </a>
                                </li>
                            @endcan

                            @can('view-any', App\Models\Ad::class)
                            <li class="nav-item {{ $page == 'ads'? 'active':''  }}">
                                <a class="nav-link" href="{{ route('ads.index') }}" >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/Products -->
                                        <i class="ti ti-badge-ad"></i>
                                        <!-- Products Icon -->
                                    </span>
                                    <span class="nav-link-title">
                                        الإعلانات
                                    </span>
                                </a>
                            </li>
                        @endcan
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item {{ $page == 'users'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('users.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Users -->
                                            <i class="ti ti-users"></i>
                                            <!-- Users Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            المستخدمين
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                            Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#navbar-access" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-lock-access"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الصلاحيات والادوار
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        @can('view-any', Spatie\Permission\Models\Role::class)
                                            <a class="dropdown-item" href="{{ route('roles.index') }}" rel="noopener">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <i class="ti ti-user-check"></i>       
                                                </span>
                                                <span class="nav-link-title">
                                                    الادوار
                                                </span>
                                            </a>
                                        @endcan
                                        @can('view-any', Spatie\Permission\Models\Permission::class)
                                            <a class="dropdown-item" href="{{ route('permissions.index') }}">
                                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                    <i class="ti ti-key"></i>
                                                </span>
                                                <span class="nav-link-title">
                                                    الصلاحيات
                                                </span>
                                            </a>
                                        @endcan
                                    </div>
                                </li>
                            @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>