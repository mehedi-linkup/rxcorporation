<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarcodeController extends Controller
{
    public function index() {
        $product = Product::latest()->get();
        $data = ['product' => $product];
        return view('admin.barcode.index', $data);
    }
    public function generate(Request $request) {
        $request->validate([
            'product_id' => 'required', 
            'number' => 'required',
        ]);
        $product = Product::latest()->get();
        // return $request->all();
        $loop = $request->number; 
        $loopArr = ['item' => $loop];      
        $product1 = Product::find($request->product_id);
        // return $product;
        $url = 'product/show/'.$product1->slug;
        // $barcode = DNS2D::getBarcodeHTML($url, 'QRCODE', 6, 6);
        return view('admin.barcode.index', compact('url', 'loopArr', 'product'));
    }
}
