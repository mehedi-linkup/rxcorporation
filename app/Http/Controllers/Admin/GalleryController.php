<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galllery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Galllery::latest()->get();
        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request->all())
         $request->validate([
            'title' =>'required|string|min:3|max:100',
            'image' =>'required|Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $gallery = new Galllery();
       $gallery->title = $request->title;
       $gallery->image = $this->imageUpload($request, 'image', 'uploads/gallery') ?? '';
       $gallery->save();
       if($gallery){
            return back()->with('success','Gallery added successfully');
        }else{
            return back()-with('error','Something error');
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
    public function edit(Galllery $gallery)
    {
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galllery $gallery)
    {
        $request->validate([
            'title' =>'required|string|min:3|max:100',
            'image' =>'|Image|mimes:jpg,png,jpeg,bmp'
       ]);
       $photoGallery ='';
       if($request->hasFile('image')){
            if(!empty($gallery->image) && file_exists($gallery->image)){
                unlink($gallery->image);
            }
            $photoGallery = $this->imageUpload($request, 'image', 'uploads/gallery');   
       }
       else{
           $photoGallery = $gallery->image;
       }  
     
       $gallery->title = $request->title;
       $gallery->image = $photoGallery;
       $gallery->save();
       if($gallery){
            return redirect()->route('gallery.index')->with('success','Gallery update successully'); 
        }else{
            return back()->with('error','Something errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galllery $gallery)
    {
        if(!empty($gallery->image) && file_exists($gallery->image)){
            unlink($gallery->image);
        }
        $gallery->delete();
        if($gallery){
            return redirect()->back()->with('success','Gallery deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Something errors');
        }   
    }
}
