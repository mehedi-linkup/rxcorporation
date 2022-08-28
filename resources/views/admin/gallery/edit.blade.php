@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Gallery Edit</h4>

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
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-20">
                <div class="card-body">
                    <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data" id="galleryForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div>
                                        <input  name="title" type="text" value="{{$gallery->title}}"  class="form-control" id="name"  placeholder="Enter Title"/>
                                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div>
                                        <input  name="image" type="file"  class="form-control" onchange="aboutUrl(this);" />    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                               
                                <div class="form-group mt-3 text-center">
                                    <img src="" alt="" id="previewImage">
                                    
                                </div>
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container-fluid -->
@endsection
@push('admin-js')
<script> 
    function aboutUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload=function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                       
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{asset($gallery->image)}}";
        
    </script>
     <script>
 
        $(document).ready(function () {
        $('#galleryForm').validate({ // initialize the plugin
            rules: {
                title: {
                    required: true
                },
                image: {
                    required: true
                },
            }
        });
         
        });
    </script>
@endpush
