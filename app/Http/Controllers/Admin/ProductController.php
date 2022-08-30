<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'category_id'=>'required|string',
            'short_des' =>'required|string|max:255',
            'code' => 'required|max:255|unique:products',
            'image'=>'required|Image|mimes:jpg,png,jpeg,bmp,gif,webp',
            'price' => 'max:10',
        ]);
        // $slug = trim($this->linkup_slug($request->name), '-');
        $slug = trim(Str::slug($request->name,'-'));

        // return $slug;
        
        // $url = 'product/show/'.$slug;
        // $barcode = DNS1D::getBarcodePNG($url, 'C39', 1, 33);
        $image = $request->file('image');
        $imgExt = strtolower($image->getClientOriginalExtension());
        $nameGen = preg_replace('/\s+/', '', $request->code);
        $imagName = $nameGen .'.'. $imgExt;
        $upLocation = 'uploads/product/';
        $image->move($upLocation, $imagName);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $slug;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->code = $request->code;
        $product->image = $upLocation . $imagName;
        // $product->image = $this->imageUpload($request, 'image', 'uploads/product')?? '';
        $product->save();
        if($product){
            return redirect()->route('product.index')->with('success','Product added successfullly');

        }else{
            return back()->with('errors', 'something went wrong');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::latest()->get();
        return view('admin.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'short_des' =>'string',
            'image'=>'Image|mimes:jpg,png,jpeg,bmp,gif,webp',
            'code' => 'required',
            'price' => 'max:10',
        ]);
        $slug = trim($this->linkup_slug($request->name), '-');
        $product = Product::findOrFail($id);
        // $productImage='';
        if($request->hasFile('image')){
            if(!empty($product->image) && file_exists($product->image)){
                unlink($product->image);
            }
            // $productImage = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
            $image = $request->file('image');
            $imgExt = strtolower($image->getClientOriginalExtension());
            $nameGen = preg_replace('/\s+/', '', $request->code);
            $imagName = $nameGen .'.'. $imgExt;
            $upLocation = 'uploads/product/';
            $image->move($upLocation, $imagName);
            $product->image = $upLocation . $imagName;
        }
        // else{
        //     $nameGen = $product->image;
        //     rename($product->image,'/uploads/product/anything.jpg');
        //     return ;
        //     $nameGenArr = explode('.', $nameGen);
        //     return $lastName = $request->code .'.'.  $nameGenArr[1];
        //     $upLocation = 'uploads/product/';
        // }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->slug = $slug;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->code = $request->code;
        // $product->image = $productImage;
        $product->save();
        if($product){
            return redirect()->route('product.index')->with('success','Product updated successfully');
        }else{
            return back()->with('error','Product updated fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);      
            if(!empty($product->image) && file_exists($product->image)){
                unlink($product->image);
            }
            $product->forceDelete();
            return redirect()->back()->with('success', 'Deleted!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Delete Failed!');
        }
    }
}
