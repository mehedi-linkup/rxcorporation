@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Update Password</h4>

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
                    <li class="text-primary">{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <form action="{{route('update.password')}}" method="post" id="authForm">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <div>
                                        <input  name="old_password" type="password" value=""  class="form-control" id="name"  placeholder="Enter Current Password"/>
                                                
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <div>
                                        <input  name="newPassword"  value="" type="password"  class="form-control"  placeholder="Enter New Password"/>
                                               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div>
                                        <input  name="confirmPass"  value="" type="password"  class="form-control"  placeholder="Enter Confirm Password"/>
                                               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Save</button>
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
 
    $(document).ready(function () {
    $('#authForm').validate({ // initialize the plugin
        rules: {
            old_password: {
                required: true
            },
            newPassword: {
                required: true
            },
            confirmPass: {
                required: true,
            },
        }
    });
     
    });
</script>


@endpush
