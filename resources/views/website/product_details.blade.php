@extends('layouts.website')
@section('website-content')
<main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Product Details</h2>
        </div>
      </div><!-- End Breadcrumbs -->
      <section>
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-6 col-md-6 text-center overflow-hidden product-details-img">
                    <img src="@if(isset($item->image)){{asset($item->image)}}@endif" alt="" class="w-100 product-details-img">
                </div>
                <div class="col-lg-6">
                    <h3><span class="me-2 text-success">Product Name:</span>@if(isset($item->name)){{$item->name}}@endif</h3>
                    <p><span class="me-2 text-success">Category:</span> @if(isset($item->category->name)){{$item->category->name}}@endif</p>
                    <p><span class="me-2 text-success">Price</span> @if(isset($item->price)){{$item->price}}@endif</p>
                    <p>@if(isset($item->description)){!!$item->description!!}@endif</p>
                </div>
            </div>
    
          </div>
      </section>

  </main>

@endsection
@push('website-js')

@endpush