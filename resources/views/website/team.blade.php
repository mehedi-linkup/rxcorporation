@extends('layouts.website')
@section('website-content')
<main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Team</h2>
        </div>
      </div><!-- End Breadcrumbs -->
      <section id="trainers" class="trainers mt-3">
        <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($team as $item)
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
      </section><!-- End Trainers Section -->

  </main>

@endsection
@push('website-js')

@endpush