<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
            'image'=>'required|Image|mimes:jpg,png,jpeg,bmp,gif',
            'price' => 'max:10',
        ]);

        $slug = trim($this->linkup_slug($request->name), '-');

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $slug;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->image = $this->imageUpload($request, 'image', 'uploads/product')?? '';
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
            'image'=>'Image|mimes:jpg,png,jpeg,bmp,gif',
            'price' => 'max:10',
        ]);
        $slug = trim($this->linkup_slug($request->name), '-');
        $product = Product::findOrFail($id);
        $productImage='';
        if($request->hasFile('image')){
            if(!empty($product->image) && file_exists($product->image)){
                unlink($product->image);
            }
            $productImage = $this->imageUpload($request, 'image', 'uploads/product') ?? '';
        }
        else{
            $productImage = $product->image;
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->slug = $slug;
        $product->short_des = $request->short_des;
        $product->description = $request->description;
        $product->image = $productImage;
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
        //
    }
}