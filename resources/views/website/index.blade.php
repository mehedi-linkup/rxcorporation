@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}">
@endpush
@section('website-content')
    <section class="slider-section">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @php
                    $count = $slider->count();
                @endphp
                @for ($i = 0; $i < $count; $i++)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}"
                        class="{{ $i == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                @endfor
            </div>
            <div class="carousel-inner">
                @foreach ($slider as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div id="hero" class="d-flex justify-content-center align-items-center"
                            style="background-image: url({{ asset($item->image) }})">
                            <div class="container position-relative d-none d-md-block" data-aos="zoom-in" data-aos-delay="100">
                                <h1>{{ $item->title }}</h1>
                                <h2>{{ $item->short_description }}</h2>
                                <a href="{{ route('home') }}" class="btn-get-started">Get Started</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ $content->about_image }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>About {!! $content->company_name !!}</h3>
                        <p class="fst-italic">
                            {!! $content->about_description !!}
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <section id="category" class="category">
            <div class="container">
                <div class="section-title">
                    <h2 class="mb-3">Product Categories</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="600">
                        <div class="owl-carousel owl-theme">
                            @foreach ($category->take(10) as $item)
                                @if($item->image)
                                <div class="item">
                                    <div class="card text-center" style="border:none">
                                        <div class="img-box border">
                                            <img src="{{ $item->image }}" class="card-img-top"
                                            alt="{{ $item->name }}">
                                            <a class="category-link" href="{{ route('product-cat.show', $item->slug) }}"></a>
                                        </div>
                                        <div class="card-body pt-2">
                                           <a href="{{ route('product-cat.show', $item->slug) }}" class="btn mt-2 rounded-0 mb-0">{{ $item->name }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>

        <section id="feature-product" class="feature-product">
            <div class="container">
                <div class="section-title">
                    <h2 class="mb-3">Featured Product</h2>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="600">
                    @foreach($product->take(8) as $item)
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <div class="img-box p-lg-3">
                                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->image }}">
                                <a class="img-link" href="{{ route('product.details', $item->slug) }}"></a>
                            </div>
                            <div class="card-body">
                              <a href="{{ route('product.details', $item->slug) }}" class="d-block card-title text-center">{{ $item->name }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ======= Counts Section ======= -->
        {{-- <section id="counts" class="counts section-bg">
      <div class="container">
        <div class="row counters">
          @foreach ($counter as $item)
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$item->number}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{$item->name}}</p>
          </div> 
          @endforeach
        </div>

      </div>
    </section><!-- End Counts Section --> --}}

        <!-- ======= Why Us Section ======= -->
        {{-- <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>{{$special_first->title}}</h3>
              <p>
                {!!$special_first->description!!}
              </p>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                @foreach ($specialize as $item)
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="card cart-hover">
                    <img src="{{asset($item->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$item->title}}</h5>
                      <p class="card-text">{!!$item->description!!}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section --> --}}


        <!-- ======= Popular Courses Section ======= -->
        {{-- <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Post</h2>
          <p>Popular post</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($post as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item cart-hover">
              <a href="{{route('post.details',$item->slug)}}">
              <img src="{{asset($item->image)}}" class="img-fluid" alt="image">
            </a>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                </div>
                <h3><a href="{{route('post.details',$item->slug)}}">{{$item->title}}</a></h3>
                <p>{!!$item->short_details!!}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{asset($item->user->image)}}" class="img-fluid" alt="">
                    <span>{{$item->user->username}}</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="far fa-clock mx-1"></i>
                    {{$item->created_at->format('d/m/Y')}}
                    
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          @endforeach
        </div>

      </div>
    </section><!-- End Popular Courses Section --> --}}

        <section class="bg-light py-4">
            <div class="container">
                <div class="section-title">
                    <h2 class="mb-3">Our Gallery</h2>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="600">
                    @foreach ($gallery->take(12) as $item)
                        <div class="col-md-3 mt-3 cart-hover">
                            <div class="card gallery gallery-image w-100">
                                <a href="{{ asset($item->image) }}"><img src="{{ asset($item->image) }}" class="w-100"
                                        alt="" title="Beautiful Image" /></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ======= Trainers Section ======= -->
        {{-- <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2 class="mb-3">Management</h2>   
      </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($management as $item)
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
            <div class="member">
              <img src="{{asset($item->image)}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{$item->name}}</h4>
                <span>{{$item->designation}}</span>
                
                <div class="social">
                  <a href="{{$item->twitter}}" target="_blank"><i class="bi bi-twitter"></i></a>
                  <a href="{{$item->facebook}}" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="{{$item->instagram}}" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="{{$item->linkedin}}" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>  
          @endforeach
         

        </div>

      </div>
    </section><!-- End Trainers Section --> --}}

    </main><!-- End #main -->
@endsection
@push('website-js')
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.fancybox.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // add all to same gallery
            $(".gallery a").attr("data-fancybox", "mygallery");
            // assign captions and title from alt-attributes of images:
            $(".gallery a").each(function() {
                $(this).attr("data-caption", $(this).find("img").attr("alt"));
                $(this).attr("title", $(this).find("img").attr("alt"));
            });
            // start fancybox:
            $(".gallery a").fancybox();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".gallery a").fancybox();
        });
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 60,
            dots:false,
            nav: true,
            // autoplay:true,
            // autoplayTimeout:1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endpush
