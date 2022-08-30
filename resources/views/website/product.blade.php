@extends('layouts.website')
@section('website-content')
<main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Product</h2>
        </div>
      </div><!-- End Breadcrumbs -->
      <section>
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach ($product as $item)
                <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
                    <div class="product w-100">
                        <a href="{{route('product.details',$item->slug)}}">
                            <img src="{{asset($item->image)}}" alt="{{ $item->code }}" class="w-100 p-3 product-image">
                            <hr/>
                          <div class="product-info d-flex w-100">
                            <div class="">
                              <p class="text-black mx-2 fw-bolder">Name </p>
                              <p class="text-black mx-2 fw-bolder">Code</p>
                              <p class="text-black mx-2 fw-bolder">Type</p>
                            </div>
                            <div>
                              <p class="text-black mx-2 fw-bolder">:</p>
                              <p class="text-black mx-2 fw-bolder">:</p>
                              <p class="text-black mx-2 fw-bolder">:</p>
                            </div>
                            <div class="">
                              <p>{{$item->name}}</p>
                              <p>
                                @php
                                  echo ($item->code)? $item->code : 'Unknown'
                                @endphp
                              </p>
                              <p>{{$item->category->name}}</p>
                            </div>
                          </div>
                        </a>
                    </div>
                </div>  
              @endforeach
            </div>
    
          </div>
      </section>

  </main>

@endsection
@push('website-js')

@endpush