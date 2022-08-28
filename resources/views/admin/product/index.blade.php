@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Product Table</h4>

                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info"><a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a></div>
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
                    <h4 class="mt-0 header-title">User Table</h4>
                    

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Short Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $key=> $item)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{!!$item->short_des!!}</td>
                                <td class="text-cener">
                                    <img src="{{asset($item->image)}}" alt="" class="table-img">
                                </td>
                                <td width="15%">
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    
                                    <button type="submit" class="btn btn-primary" onclick="deleteUser({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('product.destroy', $item) }}"
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
@endpush
