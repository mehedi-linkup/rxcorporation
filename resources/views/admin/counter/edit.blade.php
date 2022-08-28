@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Counter Edit</h4>

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
                    <form action="{{route('counter.update',$counter->id)}}" method="post" enctype="multipart/form-data" id="counterForm">
                        @csrf
                        @method('PUT')
                        <div class="row justify-conter-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Name <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="name" type="text" value="{{$counter->name}}"  class="form-control" id="name"  placeholder="Enter counter name"/>
                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Number <span class="text-primary">*</span></label>
                                    <div>
                                        <input  name="number" type="number" value="{{$counter->number}}"  class="form-control" id="number"  placeholder="Enter counter number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 counter-save">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                            
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container-fluid -->
@endsection
@push('admin-js')
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
