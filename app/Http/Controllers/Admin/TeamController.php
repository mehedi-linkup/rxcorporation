<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::latest()->get();
        return view('admin.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
     
       $team = new Team();
       $team->name =$request->name;
       $team->designation =$request->designation;
       $team->facebook =$request->facebook;
       $team->twitter =$request->twitter;
       $team->linkedin =$request->linkedin;
       $team->instagram =$request->instagram;
       $team->image = $this->imageUpload($request, 'image', 'uploads/team') ?? '';
       $team->save();

       if($team){
          return redirect()->route('team.index')->with('success','team added successfullly');
            
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
    public function edit(Team $team)
    {
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' =>'required|string|min:3',
            'designation' => 'required|string',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $teamImage ='';
       if($request->hasFile('image')){
            if(!empty($team->image) && file_exists($team->image)){
                unlink($team->image);
            }
            $teamImage = $this->imageUpload($request, 'image', 'uploads/team');   
       }
       else{
           $teamImage = $team->image;
       }  
       $team->name =$request->name;
       $team->designation =$request->designation;
       $team->facebook =$request->facebook;
       $team->twitter =$request->twitter;
       $team->linkedin =$request->linkedin;
       $team->instagram =$request->instagram;
       $team->image = $teamImage;
       $team->save();

       if($team){
        return redirect()->route('team.index')->with('success','team update successfullly');
            
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
    public function destroy(Team $team)
    {
        if(!empty($team->image) && file_exists($team->image)){
            unlink($team->image);
        }
        $team->delete();
        if($team){
            return redirect()->route('team.index')->with('success','team delete successfullly');
        }
        else{
            return redirect()->back()->with('errors', 'something went wrong');
        }
    }
}
