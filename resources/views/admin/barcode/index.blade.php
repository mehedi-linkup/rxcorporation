@push('admin-css')
<link rel="stylesheet" href="{{asset('admin')}}/css/dataTables.bootstrap4.min">
@endpush
@extends('layouts.admin')
@section('admin-content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Generate Barcode</h4>
                {{-- <div style="text-align: center;">
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" /><br><br>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('123456789', 'C39+',1,33,array(0,255,0), true)}}" alt="barcode" /><br><br>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('4', 'C39+',3,33,array(255,0,0))}}" alt="barcode" /><br><br>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" /><br><br>
                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" /><br/><br/>
                </div> --}}
                {{-- <div class="mb-3">{!! DNS1D::getBarcodePNG('product/show/Paul-Ruiz', 'C39') !!}</div> --}}
                {{-- <img src="data:image/png;base64,{!! DNS1D::getBarcodePNG('4445645656', 'PHARMA') !!}" alt="">
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA',1,33) !!}</div>
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T') !!}</div>
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'CODABAR') !!}</div>
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'KIX') !!}</div>
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'RMS4CC') !!}</div>
                <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}</div>     --}}
                <div class="state-information d-none d-sm-block">
                    {{-- <div class="state-graph">
                        <div id="header-chart-1"></div>
                        <div class="info"><a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a></div>
                    </div> --}}
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
    </div> <!-- container-fluid -->

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <form action="{{ route('barcode.store') }}" method="post" id="productForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Product <span class="text-primary">*</span></label>
                                    <div>
                                       <select name="product_id" id="productId" class="form-control">
                                           <option value=""> Select Product</option>
                                           @foreach ($product as $item)
                                           <option value="{{$item->id}}"> {{$item->name}}</option>    
                                           @endforeach
                                       </select>
                                       <span class="text-danger" id="productId-error"></span>      
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="number">Number <span class="text-primary">*</span> </label>
                                    <div>
                                        <input name="number" type="number" value="{{old('number')}}"  class="form-control" id="number"  placeholder="Number of QR code"/>
                                        <span class="text-danger" id="number-error"></span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-3 d-flex align-items-center">
                                <button type="submit" class="btn btn-info mt-2 mr-auto">Generate</button>
                            </div>
                            <div class="col-lg-12">
                                <div id="success-message"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="#!" onclick="printDiv('barcodeShow')">print</a>     
</div>
<div class="container-fluid">
    <div id="barcodeShow">  
        <div class="row">
        <style>
           
                .container-fluid {
                    width: 100%;
                    padding-right: 15px;
                    padding-left: 15px;
                    margin-right: auto;
                    margin-left: auto;
                }
                .row {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }
                .col-lg-3 {
                    -ms-flex: 0 0 25%;
                    flex: 0 0 25%;
                    max-width: 25%;
                }
               
            
        </style> 
        
        @for ($i=0; $i<@$loopArr['item']; $i++)
        {{-- @foreach(@$loopArr as $item) --}}
        <div class="col-lg-3 py-4">
            {{-- $barcode = DNS2D::getBarcodeHTML($url, 'QRCODE', 6, 6); --}}
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(asset($url), 'QRCODE',6, 6)}}" alt="barcode" />
        </div>
        @endfor
        </div> 
    </div>
</div>
@endsection
@push('admin-js')
    {{-- <script>
        $('#productForm').on('submit', function(event) {
            event.preventDefault();
            var productId = $('#productId').val();
            var number = $('#number').val();
           
            $('#productId-error').empty('');
            $('#number-error').empty('');

            $.ajax({
                url: '/barcode',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    product_id:productId,
                    number:number
                },
                success:function(response) {
                    console.log(response)
                    if(response) {
                        $('#success-message').text(response.success);
                        $('#productForm')[0].reset();
                    }
                    $.each(response, function(key, value){
                        $('#barcodeShow').append('<div class="col-lg-3"><img src="{{ asset('noimage.png') }}" alt=""></div>');
                    });
                },
                error:function(response) {
                    $('#productId-error').text(response.responseJSON.errors.product_id);
                    $('#number-error').text(response.responseJSON.errors.number);
                }
            });
            
        }) ;
    </script> --}}
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
