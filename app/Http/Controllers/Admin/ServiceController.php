<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('admin.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' =>'required|string|min:3|max:100',
            'description' =>'required',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
        $service = new Service();
        $service->title =$request->title;
        $service->description =$request->description;
        $service->image = $this->imageUpload($request, 'image', 'uploads/service') ?? '';
        $service->save();

       if($service){
           return redirect()->route('service.index')->with('success','service added successfully');
            
        }else{
            return back()->with('error','service added fail');
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
        $service = Service::where('id',$id)->first();
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
          // dd($request->all());
          $request->validate([
            'title' =>'required|string|min:3|max:100',
            'description' =>'required',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
       $service = Service::where('id',$id)->first();
        $service->title =$request->title;
        $serviceImage ='';
        if($request->hasFile('image')){
            if(!empty($service->image) && file_exists($service->image)){
                unlink($service->image);
            }
            $serviceImage = $this->imageUpload($request, 'image', 'uploads/service');   
       }
       else{
           $serviceImage = $service->image;
       } 
        $service->description =$request->description;
        $service->image = $serviceImage;
        $service->save();

       if($service){
           return redirect()->route('service.index')->with('success','service added successfully');
            
        }else{
            return back()->with('error','service added fail');
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
        $service = Service::where('id',$id)->first();
        if(!empty($service->image) && file_exists($service->image)){
            unlink($service->image);
        }
        $service->delete();
        if($service){
            return back()->with('success','service deleted successfully');
        }
        else{
            return back()->with('success','service deleted fail');
        }   
    }
}
