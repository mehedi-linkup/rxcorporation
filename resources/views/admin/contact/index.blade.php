@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Contact Table</h4>
            </div>
        </div>
    </div>
<div class="page-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Contact Table</h4>
                    

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $key=> $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td width="15%">{{$item->name}}</td>
                                <td width="7%">{{$item->created_at->format('d/m/y');}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td >{{$item->subject}}</td>
                                <td width="30%">{{$item->message}}</td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary" onclick="deleteUser({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('management.destroy', $item) }}"
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
@endpush
