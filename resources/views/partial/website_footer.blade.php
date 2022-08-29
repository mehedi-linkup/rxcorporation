 <!-- ======= Footer ======= -->
 <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-3 col-12 footer-contact">
             <div class="footer-logo">
               <a href="{{route('home')}}">
                  <img src="{{asset($content->logo)}}" alt="" class="footer-logo">
               </a>
             </div>
            <h5>
              {{ Str::limit($content->slogan,50) }}
            </h5>
          </div>
          <div class="col-lg-3 col-md-3 col-12 footer-contact">
            
            <p>
              {{$content->address}}
              <br><br>
              <strong>Phone:</strong> {{$content->phone_1}}<br>
              <strong>Email:</strong> {{$content->email}}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-3 col-12 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fas fa-home me-2"></i> <a href="{{route('home')}}">Home</a></li>
              <li><i class="fas fa-address-card  me-2"></i> <a href="{{route('about')}}">About us</a></li>
              <li><i class="fas fa-phone  me-2"></i><a href="{{route('contact')}}">Contact</a></li>
            </ul>
            
          </div>

          <div class="col-lg-3 col-md-3 col-12 ">
            <h4>Flow Us</h4>
            <div class="social-links text-md-right pt-3 pt-md-0">
              <a href="{{$content->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
              <a href="{{$content->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="{{$content->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
              <a href="{{$content->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            &copy; Copyright. All Rights Reserved By Rx Corporation
          </div>
        </div>
        <div class="col-lg-6">
          <div class="credits text-end">
            Designed by <a href="http://linktechbd.com/" target="_blank">Link Up Technology</a>
          </div>
        </div>
      </div>
      
    </div>
  </footer><!-- End Footer -->