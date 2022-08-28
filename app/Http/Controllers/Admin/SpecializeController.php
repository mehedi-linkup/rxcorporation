<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialize = Specialization::all();
        return view('admin.specialize.index',compact('specialize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialize.create');
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
        $specialization = new Specialization();
        $specialization->title =$request->title;
        $specialization->description =$request->description;
        $specialization->image = $this->imageUpload($request, 'image', 'uploads/specialize') ?? '';
        $specialization->save();

       if($specialization){
           return redirect()->route('specialize.index')->with('success','Specialization added successfully');
            
        }else{
            return back()->with('error','Specialization added fail');
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
        $specialization = Specialization::where('id',$id)->first();
        return view('admin.specialize.edit',compact('specialization'));
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
       $specialization = Specialization::where('id',$id)->first();
        $specialization->title =$request->title;
        $specializationImage ='';
        if($request->hasFile('image')){
            if(!empty($specialization->image) && file_exists($specialization->image)){
                unlink($specialization->image);
            }
            $specializationImage = $this->imageUpload($request, 'image', 'uploads/specialize');   
       }
       else{
           $specializationImage = $specialization->image;
       } 
        $specialization->description =$request->description;
        $specialization->image = $specializationImage;
        $specialization->save();

       if($specialization){
           return redirect()->route('specialize.index')->with('success','Specialization added successfully');
            
        }else{
            return back()->with('error','Specialization added fail');
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
        $specialization = Specialization::where('id',$id)->first();
        if(!empty($specialization->image) && file_exists($specialization->image)){
            unlink($specialization->image);
        }
        $specialization->delete();
        if($specialization){
            return back()->with('success','Specialization deleted successfully');
        }
        else{
            return back()->with('success','specialization deleted fail');
        }   
    }
}
