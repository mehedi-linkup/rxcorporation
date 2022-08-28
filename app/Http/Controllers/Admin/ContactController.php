<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactStore(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'max:100',
            'phone' => 'max:11',
            'email' => 'max:50|min:5',
        ]);

        $message = new Contact();
        $message->name = $request->name;
        $message->phone = $request->phone; 
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        if($message){
            
            return back()->with('message','Message Sent Successfully, Thank You');
        }
        else{
            return back()->with('message','your message fail! Try Again.');
        }
    }
    public function contactList(){
        $contact = Contact::latest()->get();
        return view('admin.contact.index',compact('contact'));
    }
}
