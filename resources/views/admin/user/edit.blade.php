@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit User </h4>

                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info"><a href="{{route('user.index')}}" class="btn btn-primary">Back</a></div>
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
                    <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data" id="userForm">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input  name="name" type="text" value="{{$user->name}}"  class="form-control" id="name"  placeholder="Enter Name"/>
                                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div>
                                        <input  name="email" id="email" value="{{$user->email}}" type="email"  class="form-control"  placeholder="Enter Email"/>
                                               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div>
                                        <input  name="phone" id="phone" type="text" value="{{$user->phone}}"  class="form-control" />
                                              
                                    </div>
                                </div>
                                
                               
                              
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <div>
                                        <input  name="username"  value="{{$user->username}}" type="text"  class="form-control" />
                                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div>
                                        <input  name="image" type="file"  class="form-control" onchange="aboutUrl(this);" />
                                               
                                                <br/>
                                                <img src="" alt="" id="previewImage">
                                    </div>
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
        document.getElementById("previewImage").src="{{asset($user->image)}}";
        
    </script>
    <script>
 
    $(document).ready(function () {
    $('#userForm').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            phone: {
                required: true
            },
            username: {
                required: true
            },
            password: {
                required: true
            },
            confirmed_password: {
                required: true
            },
        }
    });
     
    });
</script>
@endpush
