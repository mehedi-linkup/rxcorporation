@extends('layouts.website')
@section('website-content')
<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>{{$post->title}}</h2>
          
        </div>
      </div><!-- End Breadcrumbs -->
  
      <!-- ======= Cource Details Section ======= -->
      <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-8">
              <img src="{{asset($post->image)}}" class="img-fluid" alt="">
              <h3>{{$post->title}}</h3>
              <p>
                {!!$post->description!!}
              </p>
            </div>
            <div class="col-lg-4">
              <div class="section-title">Recent Post</div>
              @foreach ($posts as $item)
              <div class="course-info d-flex justify-content-between align-items-center">
                <a href="{{route('post.details',$item->slug)}}"><h5>{{$item->title}}</h5></a>
                
              </div>
              @endforeach
            
  
            </div>
          </div>
  
        </div>
      </section><!-- End Cource Details Section -->

  </main>

@endsection
@push('website-js')

@endpush