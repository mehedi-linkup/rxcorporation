<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = Counter::latest()->get();
        return view('admin.counter.index',compact('counter'));
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
         // dd($request->all())
         $request->validate([
            'name' =>'required|string|min:3|max:30',
            'number' =>'required'
       ]);
     
       $counter = new Counter();
       $counter->name = $request->name;
       $counter->number = $request->number;
       $counter->save();
       if($counter){
            return back()->with('success','counter added successfully');
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
    public function edit(Counter $counter)
    {
        return view('admin.counter.edit',compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
         // dd($request->all())
         $request->validate([
            'name' =>'string|min:3|max:30',
       ]);
     
       $counter->name = $request->name;
       $counter->number = $request->number;
       $counter->save();
       if($counter){
            return redirect()->route('counter.index')->with('success','counter updated successfully');
        }else{
            return back()-with('error','Something error');
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
        $counter = Counter::where('id',$id)->delete();
        if($counter){
            return back()->with('success','counter deleted successfully');
        }else{
            return back()-with('error','Something error');
        }
    }
}
