<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    // Authentication check
    public function loginCheck(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:1',
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended('dashboard');
        }
        return redirect()->route('login')->withInput();
    }

    // logout 
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function passwordEdit(){
        return view('admin.auth.passChang');
    }
    // password change
    public function passwordUpdate(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'newPassword' => 'required|same:confirmPass',
        ]);
        $has_password = Auth::user()->password;
        if(Hash::check($request->old_password, $has_password))
        {
            if(!Hash::check($request->old_password, $has_password))
            {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->newPassword);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }
            else
            {
                return redirect()->back()->withInput();
            }
        }
        else
        {
            return 'password dose not match';
        }
        
    }
    public function editProfile(Request $request){
            return view('admin.auth.edit');
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' =>'required|string|min:3',
            'email' => 'max:50',
            'phone' => 'max:11',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
       
       $user = User::where('id',Auth::user()->id)->first();
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
           return back()->with('success','Profile update successfully');
            
        }else{
            return back()->with('error','Something errors');
        }
    }
    
}
