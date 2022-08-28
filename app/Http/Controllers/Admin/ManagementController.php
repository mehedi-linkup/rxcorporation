<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management = Management::latest()->get();
        return view('admin.management.index',compact('management'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management.create');
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
            'name' =>'required|string|min:3|max:100',
            'designation' => 'required|string|max:50',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $committee = new Management();
       $committee->name =$request->name;
       $committee->designation =$request->designation;
       $committee->facebook =$request->facebook;
       $committee->twitter =$request->twitter;
       $committee->linkedin =$request->linkedin;
       $committee->instagram =$request->instagram;
       $committee->image = $this->imageUpload($request, 'image', 'uploads/management') ?? '';
       $committee->save();

       if($committee){
          return redirect()->route('management.index')->with('success','Management added successfullly');
            
        }else{
            return back()->with('error','Something Error');
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
    public function edit(Management $management)
    {
        return view('admin.management.edit',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        $request->validate([
            'name' =>'required|string|min:3',
            'designation' => 'required|string',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $managementImage ='';
       if($request->hasFile('image')){
            if(!empty($management->image) && file_exists($management->image)){
                unlink($management->image);
            }
            $managementImage = $this->imageUpload($request, 'image', 'uploads/management');   
       }
       else{
           $managementImage = $management->image;
       }  
       $management->name =$request->name;
       $management->designation =$request->designation;
       $management->facebook =$request->facebook;
       $management->twitter =$request->twitter;
       $management->linkedin =$request->linkedin;
       $management->instagram =$request->instagram;
       $management->image = $managementImage;
       $management->save();

       if($management){
        return redirect()->route('management.index')->with('success','Management update successfullly');
            
        }else{
            return back()->with('error','Something error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        if(!empty($management->image) && file_exists($management->image)){
            unlink($management->image);
        }
        $management->delete();
        if($management){
            return redirect()->route('management.index')->with('success','Management delete successfullly');
        }
        else{
            return redirect()->back()->with('errors', 'something went wrong');
        }
    }
}
