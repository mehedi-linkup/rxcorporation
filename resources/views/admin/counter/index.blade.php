@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Counter Add</h4>

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
    <div class="row justify-conter-center">
        <div class="col-lg-12">
            <div class="card mb-20">
                <div class="card-body">
                    <form action="{{route('counter.store')}}" method="post" enctype="multipart/form-data" id="counterForm">
                        @csrf
                        <div class="row justify-conter-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Name <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="name" type="text" value="{{old('name')}}"  class="form-control" id="name"  placeholder="Enter counter name"/>
                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Number <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="number" type="number" value="{{old('number')}}"  class="form-control" id="number"  placeholder="Enter counter number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 counter-save">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                            
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Counter Table</h4>
                    

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counter as $key=> $item)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td width="30%">{{$item->name}}</td>
                                <td width="30%">{{$item->number}}</td>
                                <td class="text-center">
                                    <a href="{{route('counter.edit',$item->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                   
                                    <button type="submit" class="btn btn-primary" onclick="deleteUser({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('counter.destroy', $item) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
              
                    
                </div>
            </div>
         </div> <!-- end col -->
    </div> <!-- end row -->  
</div> <!-- container-fluid -->
@endsection
@push('admin-js')
<script src="{{asset('admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin')}}/js/sweetalert2.all.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
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
          function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
       <script>
 
        $(document).ready(function () {
        $('#counterForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true
                },
                number: {
                    required: true,
                },
            }
        });
         
        });
    </script>
@endpush
