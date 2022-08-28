@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">About Us</h4>

                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        {{-- <div class="info">Balance $ 2,317</div> --}}
                    </div>
                    <div class="state-graph">
                        <div id="header-chart-2"></div>
                        {{-- <div class="info">Item Sold 1230</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="page-content-wrapper">
    @if ($errors->any())
        <div class="alert alert-primary">
            <ol>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <form action="{{route('about.us.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Slogan</label>
                                    <input type="text"   name="slogan" class="form-control" rows="10" value="{{$content->slogan}}" />
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea id="short_description"  name="short_description" rows="10">{{$content->short_description}}</textarea>
                                </div>
                               
                                
                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">About Description</label>
                                    <textarea id="aboutEditor"  name="about_description" rows="10">{{$content->about_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">About Image</label>
                                   <input type="file" class="form-control" name="about_image" onchange="aboutUrl(this)">
                                <br/><img src="" alt="" id="previewImage" style="height: 100px;width:150px">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                    
                </div>
            </div>
         </div> <!-- end col -->
    </div> <!-- end row -->  
</div> <!-- container-fluid -->
@endsection
@push('admin-js')
<script src="{{asset('admin')}}/js/ckeditor.js"></script>
<script type="text/javascript">
    //<![CDATA[
    CKEDITOR.replace( 'editor1',
    {
    skin : 'office2003',
    height: '100%'
    });
    //]]>
    </script>
<script>
  
    ClassicEditor
        .create( document.querySelector( '#aboutEditor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
  
    ClassicEditor
        .create( document.querySelector( '#short_description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script> 
    function aboutUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload=function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100);
                       
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{asset($content->about_image)}}";
        
    </script>
@endpush
