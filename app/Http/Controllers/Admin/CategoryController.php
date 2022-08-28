<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:100',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
        ]);

        $slug = trim($this->linkup_slug($request->name), '-');

        $category = new Category();
        $category->name = $request->name;
        $category->slug =$slug;
        $category->name = $request->name;
        $category->image = $this->imageUpload($request, 'image', 'uploads/category');
        $category->save();

        if($category){
            return back()->with('success','Category added successfully');
        }else{
            return back()->with('error','Category added fail');
        }
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
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
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
            'name' => 'max:100',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
        ]);
        

        $category = Category::where('id',$id)->first();
        $category->name = $request->name;
        $categoryImage='';
        if($request->hasFile('image')){
            if(!empty($category->image) && file_exists($category->image)){
                unlink($category->image);
            }
            $categoryImage = $this->imageUpload($request, 'image', 'uploads/category') ?? '';
        }
        else{
            $categoryImage = $category->image;
        }

        $category->image = $categoryImage;
        $category->save();

        if($category){
            return redirect()->route('category.index')->with('success','Category update successfully');
        }else{
            return back()->with('error','category updated fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $product = Product::where('category_id',$category->id)->count();
        if($product>0){
            return back()->with('error','Category related product delete first');
        }
        else{
            $category = Category::where('id',$category->id)->first();
        if(!empty($category->image) && file_exists($category->image)){
            unlink($category->image);
        }
        $category->delete();
        if($category){
            return redirect()->route('category.index')->with('success','Category update successfully');
        }
            else{
                return back()->with('error','category updated fail');
            } 
        }
    }
}
