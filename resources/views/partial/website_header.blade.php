  <!-- ======= Header ======= -->
  {{-- <section class="header-top">
      <div class="container d-flex">
        <div class="header-left"><i class="fas fa-phone-alt"></i> {{$content->phone_1}}</div>
        <div class="header-right ms-auto">
          <div class="social-links text-md-right pt-3 pt-md-0">
            <a href="{{$content->twitter}}" target="_blank" class="twitter social-a"><i class="fab fa-twitter"></i></a>
            <a href="{{$content->facebook}}" target="_blank" class="facebook social-a"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$content->instagram}}" target="_blank" class="instagram social-a"><i class="fab fa-instagram"></i></a>
            <a href="{{$content->linkedin}}" target="_blank" class="linkedin social-a"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
  </section> --}}
  <header id="header" class="sticky-top">
    <div class="container d-flex align-items-center">
      @php
         $route = Route::current()->getName();
      @endphp
      <h1 class="logo "><a href="{{route('home')}}"><img src="{{asset($content->logo)}}" alt=""></a> </h1>
       {{-- <div class=" me-auto"><h3 class="comapnay-name">{{$content->company_name}}</h3></div> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last ms-auto order-lg-0">
        <ul>
          <li><a class="{{($route == 'home')?'active':''}}" href="{{route('home')}}">Home</a></li>
          {{-- <li><a class="" href="{{route('product.show')}}">Product</a></li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
              Product
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('product.show') }}" id="navbarDropdown1">All Product</a>
              </li>
              @foreach ($categories as $item)
              @php
                  $product = App\Models\Product::where('category_id', $item->id)->orderBy('name', 'ASC')->get();
                  $productCount = $product->count();
              @endphp
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-item d-flex justify-content-between" href="{{ route('product-cat.show', $item->slug) }}" id="navbarDropdown1" aria-expanded="false">
                      <span class="submenu">{{ $item->name }}</span>@if($productCount)<span class="icon"><i class="fas fa-caret-right"></i></span>@endif
                  </a>
                  @if($productCount)
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    @foreach ($product as $item2)
                    <li><a class="dropdown-item" href="{{ route('product.details', $item2->slug) }}">{{ $item2->name }}</a></li>
                    @endforeach
                  </ul>
                  @endif
              </li>
              @endforeach
            </ul>
          </li>
          <li><a class="{{($route == 'about')?'active':''}}"  href="{{route('about')}}">About Us</a></li>
          {{-- <li><a class="{{($route == 'management.show')?'active':''}}" href="{{route('management.show')}}">Management</a></li> --}}
          {{-- <li><a class="{{($route == 'team.show')?'active':''}}" href="{{route('team.show')}}">Team</a></li> --}}
          <li><a class="{{($route == 'gallery.show')?'active':''}}"  href="{{route('gallery.show')}}">Photo Gallery</a></li>
          <li><a class="{{($route == 'contact')?'active':''}}" href="{{route('contact')}}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

     

    </div>
  </header><!-- End Header -->