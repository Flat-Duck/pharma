<header class="header">
    <div class="container-fluid">
      <nav class="navbar upper d-lg-flex d-none">
        <a class="navbar-brand" href="index.html">
          <img alt="" style="height: 120px; max-height: 140px;" src="/pharma_logo.png" />
        </a>
        <div class="search-bar">
          {{-- <form method="get" action="https://uiparadox.co.uk/templates/book_store/index.html">
            <div class="form-group header-search">
              <button type="submit" class="fa fa-search form-control-search"></button>
              <input type="text" class="form-control" placeholder="Find the book you like..." />
            </div>
          </form> --}}
        </div>
        <div class="right-content">
          @auth
            <a href="#"><img src="{{asset("assets/media/icons/wish-list.png")}}" alt="" /></a>
            <a href="{{ route('shop.cart.show') }}"><img src="{{asset("assets/media/icons/shopping-cart.png")}}" alt="" /></a>
            <ul class="unstyled">
              <li>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <h6>تسجيل خروج</h6>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
              </li>
            </ul>
          @endauth
          @guest
            <ul class="unstyled">
              <li>
                <a href="{{ route('login') }}" class="login-border active">
                  <h6>تسجيل دخول</h6>
                </a>
              </li>
              @if (Route::has('register'))
              <li>
                <a href="{{ route('register') }}">
                  <h6>انشاء حساب جديد</h6>
                </a>
              </li>
              @endif
            </ul>
          @endguest
        </div>
      </nav>
    </div>
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand d-lg-none" href="index.html">
        <img alt="" src="{{asset("assets/media/brand-logo.png")}}" />
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <i class="fas fa-bars"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav mainmenu m-0">
            <h6 class="p-3"><a href="{{route('shop.home')}}" >الرئيسية</a></h6>
            <h6 class="p-3"><a href="{{route('shop.orders')}}" >الطلبيات</a></h6>
            <h6 class="p-3"><a href="{{route('shop.chats')}}">تواصل </a></h6>
          
        </ul>
      </div>
    </nav>
  </header>
