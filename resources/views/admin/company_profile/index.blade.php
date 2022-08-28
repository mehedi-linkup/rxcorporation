@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Company Profile</h4>

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
    <div class="card m-b-20">
        <div class="card-body">
            <h4 class="mt-0 header-title">Company Profile </h4>
            @if ($errors->any())
            <div class="alert alert-primary">
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
    <form class="" action="{{route('company.update',$content)}}" method="POST" enctype="multipart/form-data" id="companyForm">
        <div class="row">
            <div class="col-lg-6">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$content->company_name}}" name="company_name" class="form-control" required placeholder="Type something"/>
                    @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>
                <div class="form-group">
                    <label>Phone 1</label>
                    <div>
                        <input data-parsley-type="number" value="{{$content->phone_1}}" name="phone_1" type="text"
                                class="form-control" required
                                placeholder="Enter only numbers"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone 2</label>
                    <div>
                        <input data-parsley-type="number" value="{{$content->phone_2}}" name="phone_2" type="text"
                                class="form-control" required
                                placeholder="Enter only numbers"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <div>
                        <input type="email" class="form-control" value="{{$content->email}}" name="email" required
                                parsley-type="email" placeholder="Enter a valid e-mail"/>
                                
                    </div>
                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <div>
                        <input type="url" class="form-control" value="{{$content->facebook}}" name="facebook" 
                                parsley-type="email" placeholder="Enter a valid e-mail"/>
                                
                    </div>
                </div>
                <div class="form-group">
                    <label>Twitter</label>
                    <div>
                        <input type="url" class="form-control" value="{{$content->twitter}}" name="twitter" 
                                parsley-type="email" placeholder="Enter a valid e-mail"/>
                                
                    </div>
                </div>
                

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Instagram</label>
                    <div>
                        <input type="url" class="form-control" value="{{$content->instagram}}" name="instagram" 
                                placeholder="Enter a valid e-mail"/>
                                
                    </div>
                </div>
                <div class="form-group">
                    <label>Linkedin</label>
                    <div>
                        <input type="url" class="form-control" value="{{$content->linkedin}}" name="linkedin" 
                                 placeholder="Enter a facebook url"/>
                                
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <div>
                        <textarea name="address" class="form-control" rows="5" placeholder="Address">{{$content->address}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <div>
                        <input type="file" class="form-control"  name="logo" onchange="aboutUrl(this);" >
                    </div>
                </div>
                <div class="form-group">
                <img src="" alt="" id="previewImage">
                </div>
                
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Update
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
                   
        </form>

                </div>
            </div>
        </div> <!-- end col -->

    </div> <!-- end row -->  
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
                        .width(100);
                       
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{ asset($content->logo) }}";
        
    </script>
        <script>
            $('#companyForm').validate({ // initialize the plugin
            
               rules: {
                   name: {
                       required: true,
                   },
                   phone_1: {
                   required: true,
                   digits: true
                   },
                   phone_2: {
                   digits: true
                   },
                   email: {
                       required: true
                   },
                   logo: {
                   required: true
                   },
                   facebook:{
                       url:true,
                   }
                   twitter:{
                       url:true,
                   }
                   linkedin:{
                       url:true,
                   }
                   instagram:{
                       url:true,
                   }
               }
           
           });
            
           </script>
@endpush
