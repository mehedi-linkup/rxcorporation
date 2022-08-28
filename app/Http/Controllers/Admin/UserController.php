<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->get();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'username' => 'required|unique:users|max:50',
            'email' => 'required|unique:users|max:50',
            'image' => 'image|mimes:jpg,png,gif,bmp',
            'password' => 'required|same:confirmed_password|min:2',
            'ip_address' => 'max:15'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
        $user->role = 1;
        $user->saved_by = 1;
        $user->ip_address = $request->ip();
        $user->save();
        if ($user) {
            return redirect()->route('user.index')->with('success','user created successfully');
        } else {
            return back()->with('error','Opps! Something Error');
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
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' =>'required|string|min:3',
            'phone' => 'max:11|unique:users,id',
            'email' => 'max:50|unique:users,id',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $userImage ='';
       if($request->hasFile('image')){
            if(!empty($user->image) && file_exists($user->image)){
                unlink($user->image);
            }
            $userImage = $this->imageUpload($request, 'image', 'uploads/user');   
       }
       else{
           $userImage = $user->image;
       }  
       $user->name =$request->name;
       $user->email =$request->email;
       $user->phone =$request->phone;
       $user->username =$request->username;
       $user->image = $userImage;
       $user->save();

       if($user){
        return redirect()->route('user.index')->with('success','user update successfullly');
            
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
    public function destroy(User $user)
    {
        if(!empty($user->image) && file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();
        if($user){
            return redirect()->route('user.index')->with('success','Management delete successfullly');
        }
        else{
            return redirect()->back()->with('errors', 'something went wrong');
        }
    }
}
