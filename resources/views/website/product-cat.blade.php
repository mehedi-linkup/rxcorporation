@extends('layouts.website')
@section('website-content')
<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('product.show') }}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Breadcrumbs -->
      <section>
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @forelse ($product as $item)
              <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
                  <div class="product w-100">
                      <a href="{{route('product.details',$item->slug)}}">
                          <img src="{{asset($item->image)}}" alt="" class="w-100 p-3 product-image">
                          <hr/>
                        <div class="product-info d-flex w-100">
                          <div class="">
                            <p class="text-black mx-2 fw-bolder">Name </p>
                            <p class="text-black mx-2 fw-bolder">Price</p>
                            <p class="text-black mx-2 fw-bolder">Type</p>
                          </div>
                          <div>
                            <p class="text-black mx-2 fw-bolder">:</p>
                            <p class="text-black mx-2 fw-bolder">:</p>
                            <p class="text-black mx-2 fw-bolder">:</p>
                          </div>
                          <div class="">
                            <p>{{$item->name}}</p>
                            <p>{{$item->price}}</p>
                            <p>{{$item->category->name}}</p>
                          </div>
                        </div>
                      </a>
                  </div>
              </div>  
              @empty
              <div class="col-lg-12 col-md-12">
                <div class="card">
                    <p class="p-5 m-0">No Product Found</p>
                </div>
              </div>
              @endforelse
            </div>
    
          </div>
      </section>

  </main>

@endsection
@push('website-js')

@endpush