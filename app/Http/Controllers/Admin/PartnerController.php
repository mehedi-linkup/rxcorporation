<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::all();
        return view('admin.partner.index',compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
            'name' =>'required|string|min:3|max:100',
            'description' =>'required',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
        $partner = new Partner();
        $partner->name =$request->name;
        $partner->description =$request->description;
        $partner->image = $this->imageUpload($request, 'image', 'uploads/specialize') ?? '';
        $partner->save();

       if($partner){
           return redirect()->route('partner.index')->with('success','partner added successfully');
            
        }else{
            return back()->with('error','partner added fail');
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
        $partner = Partner::where('id',$id)->first();
        return view('admin.partner.edit',compact('partner'));
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
            'name' =>'required|string|min:3|max:100',
            'description' =>'required',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
       $partner = Partner::where('id',$id)->first();
        $partner->name =$request->name;
        $partnerImage ='';
        if($request->hasFile('image')){
            if(!empty($partner->image) && file_exists($partner->image)){
                unlink($partner->image);
            }
            $partner = $this->imageUpload($request, 'image', 'uploads/partner');   
       }
       else{
           $partnerImage = $partner->image;
       } 
        $partner->description =$request->description;
        $partner->image = $partnerImage;
        $partner->save();

       if($partner){
           return redirect()->route('partner.index')->with('success','partner added successfully');
            
        }else{
            return back()->with('error','partner added fail');
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
        $partner = Partner::where('id',$id)->first();
        if(!empty($partner->image) && file_exists($partner->image)){
            unlink($partner->image);
        }
        $partner->delete();
        if($partner){
            return back()->with('success','partner deleted successfully');
        }
        else{
            return back()->with('success','partner deleted fail');
        }   
    }
}
