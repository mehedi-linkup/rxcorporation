@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Welcome to  Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    <div class="page-content-wrapper">   
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('post.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Posts</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Posts</h6>
                                    <h3 class="mb-3 mt-0">{{$post}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('product.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Products</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Products</h6>
                                    <h3 class="mb-3 mt-0">{{$product}}</h3>
                                  </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('contact.list')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Messages</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Messages</h6>
                                    <h3 class="mb-3 mt-0">{{$message}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('management.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Management</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Management</h6>
                                    <h3 class="mb-3 mt-0">{{$management}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('slider.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Slider</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Slider</h6>
                                    <h3 class="mb-3 mt-0">{{$slider}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('service.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Service</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Service</h6>
                                    <h3 class="mb-3 mt-0">{{$management}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('gallery.index')}}">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">Gallery</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50">Gallery</h6>
                                <h3 class="mb-3 mt-0">{{$gallery}}</h3>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <a href="{{route('team.index')}}">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Team</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Team</h6>
                                    <h3 class="mb-3 mt-0">{{$team}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- end row -->


</div> <!-- container-fluid -->
@endsection