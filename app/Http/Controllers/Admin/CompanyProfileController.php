<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function index(){
        return view('admin.company_profile.index');
    }
    public function update(Request $request, CompanyProfile $company){
        // dd($request->all());
        $request->validate([
            'company_name' => 'required|max:100',
            'email' => 'required|email',
            'phone_1' => 'min:11|max:11',
            'phone_2' => 'min:11|max:11',
            'address' => 'required|string',
            'logo' => 'mimes:jpg,jpeg,png,bmp',
        ]);

        // Image Update 
        $companyLogo = '';
        $company = CompanyProfile::first();
        if ($request->hasFile('logo')) {
            if (!empty($company->logo) && file_exists($company->logo)) {
                unlink($company->logo);
            }
            $companyLogo = $this->imageUpload($request, 'logo', 'uploads/logo/');
        } else {
            $companyLogo = $company->logo;
        }
        $company->company_name = $request->company_name;
        $company->email = $request->email;
        $company->phone_1 = $request->phone_1;
        $company->phone_2 = $request->phone_2;


        $company->address = $request->address;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->linkedin = $request->linkedin;
        $company->instagram = $request->instagram;
        $company->updated_by = 1;
        $company->logo = $companyLogo;
        $company->save();
        if ($company) {
           
            return redirect()->back()->with('success','Profile updated successfully');
        }
        else{
            return redirect()->back()->with('error','Update Fail');
        }
    
    }
    public function edit(){
        return view('admin.company_profile.about_us');
    }
    public function aboutUs(Request $request){

        $request->validate([
            'image' => 'mimes:jpg,jpeg,png,bmp',
        ]);
        // dd($request->all());
        $company = CompanyProfile::first();
        $about_image = '';
        if ($request->hasFile('about_image')) {
            if (!empty($company->about_image) && file_exists($company->about_image)) {
                unlink($company->about_image);
            }
            $about_image =$this->imageUpload($request, 'about_image', 'uploads/about/');
        } else {
            $about_image = $company->about_image;
        }

        $company->about_image       = $about_image;
        $company->about_description = $request->about_description;
        $company->short_description = $request->short_description;
        $company->save();

        return back()->with('success', 'About us updated successfully.');
    }
}
