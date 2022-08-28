@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Management</h4>

                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info"><a href="{{route('management.index')}}" class="btn btn-primary">Management List</a></div>
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
                    <form action="{{route('management.store')}}" method="post" enctype="multipart/form-data" id="managementForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="name" type="text" value="{{old('name')}}"  class="form-control" id="name"  placeholder="Enter Name"/>
                                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Designation <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="designation" value="{{old('designation')}}" type="text"  class="form-control"  placeholder="Enter Designation"/>
                                               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <div>
                                        <input  name="facebook"  type="url" value="{{old('facebook')}}"  class="form-control"  placeholder="Facebook Link"/>
                                              
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <div>
                                        <input  name="twitter"  value="{{old('twitter')}}" type="url"  class="form-control"  placeholder="Twitter Link"/>
                                                
                                    </div>
                                </div>
                               
                              
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div>
                                        <input  name="instagram"  value="{{old('instagram')}}" type="url"  class="form-control"  placeholder="Instagram Link"/>
                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <div>
                                        <input  name="linkedin"  value="{{old('linkedin')}}" type="url"  class="form-control"  placeholder="Linkedin Link"/>
                                            
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
                        <button type="submit" class="btn btn-info">Save</button>
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
        document.getElementById("previewImage").src="/noimage.png";
        
    </script>
    <script>
 $('#managementForm').validate({ // initialize the plugin
 
    rules: {
 
        name: {
            required: true
 
        },
        designation: {
 
        required: true

        },
        image: {
 
        required: true

        },
 
    }

 
});
 
</script>
@endpush
