@extends('layouts.website')
@section('website-content')
<main id="main">

    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
          <h2>Gallery</h2>
        </div>
      </div><!-- End Breadcrumbs -->
      <section class="bg-light py-4">
        <div class="container">
            <div class="row">
              @foreach ($gallery as $item)
              <div class="col-md-3">
                      <div class="card gallery gallery-image w-100">
                          <a href="{{ asset($item->image) }}"><img src="{{ asset($item->image) }}" class="w-100" alt="" title="Beautiful Image" /></a>
                         
                      </div>
              </div>
              @endforeach
                
              </div>
        </div>
    </section>

  </main>

@endsection
@push('website-js')
<script src="{{asset('website/js/jquery.fancybox.min.js')}}"></script>
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
</script>
@endpush