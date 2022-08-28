@extends('layouts.website')
@section('website-content')
{!! Toastr::message() !!}
<main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Contact Us</h2>
        </div>
      </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container mb-5" data-aos="fade-up">
          <div class="row mt-5">
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>{{$content->address}}</p>
                </div>
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{$content->email}}</p>
                </div>
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>{{$content->phone_1}}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
              @if(session('message'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    {{session('message')}}
                  </div>
                </div>
              @endif
              <form action="{{route('sms.store')}}" method="post" >
                @csrf
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name *" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email *" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                </div>
                <div class="text-center"><button class="btn btn-success" type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
        <div data-aos="fade-up">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7131230791056!2d90.41241211480468!3d23.79322789305623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0d0d4234f%3A0x94a291b19ae44119!2sRx%20Medical%20Center!5e0!3m2!1sen!2sbd!4v1645355628281!5m2!1sen!2sbd"style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </section><!-- End Contact Section -->

  </main>

@endsection
@push('website-js')

@endpush



