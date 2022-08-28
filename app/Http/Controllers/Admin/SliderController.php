<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::OrderBy('id', 'Desc')->get();
        return view('admin.slider.index', compact('slider'));
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
            'title' =>'required|string|min:3|max:100',
            'image' =>'required|Image|mimes:jpg,png,jpeg,bmp',
            'short_description' => 'max:255',
       ]);
     
       $slider = new Slider();
       $slider->title = $request->title;
       $slider->short_description = $request->short_description;
       $slider->image = $this->imageUpload($request, 'image', 'uploads/banner') ?? '';
       $slider->save();
       if($slider){
            return back()->with('success','Slider upload successfully'); 
        }else{
            return back()->with('success','Slider upload successfully'); 
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
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' =>'required|string|min:3',
            'image' =>'|Image|mimes:jpg,png,jpeg,bmp',
            'short_description' => 'max:255',
       ]);
       $sliderPhoto ='';
       if($request->hasFile('image')){
            if(!empty($slider->image) && file_exists($slider->image)){
                unlink($slider->image);
            }
            $sliderPhoto = $this->imageUpload($request, 'image', 'uploads/banner');   
       }
       else{
           $sliderPhoto = $slider->image;
       }  
     
       $slider->title = $request->title;
       $slider->short_description = $request->short_description;
       $slider->image = $sliderPhoto;
       $slider->save();
       if($slider){
            return redirect()->route('slider.index')->with('success','Slider update successfully'); 
        }else{
            return back()->with('error','Slider update error'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        
        if(!empty($slider->image) && file_exists($slider->image)){
            unlink($slider->image);
        }
        $slider->delete();
        if($slider){
            return redirect()->route('slider.index')->with('success','Slider deleted successfully'); 
        }
        else{
            return back()->with('error','Slider delete error'); 
        } 
    }
}
