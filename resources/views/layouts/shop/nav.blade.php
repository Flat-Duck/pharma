<header class="header">
    <div class="container-fluid">
      <nav class="navbar upper d-lg-flex d-none">
        <a class="navbar-brand" href="index.html">
          <img alt="" src="{{asset("assets/media/brand-logo.png")}}" />
        </a>
        <div class="search-bar">
          <form method="get" action="https://uiparadox.co.uk/templates/book_store/index.html">
            <div class="form-group header-search">
              <button type="submit" class="fa fa-search form-control-search"></button>
              <input type="text" class="form-control" placeholder="Find the book you like..." />
            </div>
          </form>
        </div>
        <div class="right-content">
          <a href="#"><img src="{{asset("assets/media/icons/wish-list.png")}}" alt="" /></a>
          <a href="cart.html"><img src="{{asset("assets/media/icons/shopping-cart.png")}}" alt="" /></a>
          <ul class="unstyled">
            <li>
              <a href="login.html" class="login-border active">
                <h6>Login</h6>
              </a>
            </li>
            <li>
              <a href="signup.html">
                <h6>Register</h6>
              </a>
            </li>
          </ul>
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
          <li class="menu-item-has-children">
            <h6><a href="javascript:void(0);" class="active">Home</a></h6>
            <ul class="submenu">
              <li><a href="index.html">Home 1</a></li>
              <li><a href="index-2.html" class="active">Home 2</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <h6><a href="javascript:void(0);">Shop</a></h6>
            <ul class="submenu">
              <li><a href="shop-listing.html">Shop Listing</a></li>
              <li><a href="shop-listing-2.html">Shop Listing 2</a></li>
              <li><a href="product-detail.html">Product Detail</a></li>
              <li><a href="product-detail_2.html">Product Detail 2</a></li>
              <li><a href="cart.html">Cart</a></li>
              <li><a href="checkout.html">Checkout</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <h6><a href="javascript:void(0);">Blog</a></h6>
            <ul class="submenu">
              <li><a href="blogs.html">Blogs</a></li>
              <li><a href="blog-detail.html">Blog Detail</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children">
            <h6><a href="javascript:void(0);">Pages</a></h6>
            <ul class="submenu">
              <li><a href="about.html">About Us</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="faqs.html">FAQ's</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="signup.html">Signup</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
