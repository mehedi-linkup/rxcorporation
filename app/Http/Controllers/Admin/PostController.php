<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
            'date' =>'required|date',
            'short_details' =>'required|string|max:120',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
        $slug = trim($this->linkup_slug($request->title), '-');
        $post = new Post();
        $postImage ='';
        if($request->hasFile('image')){
            if(!empty($post->image) && file_exists($post->image)){
                unlink($post->image);
            }
            $postImage = $this->imageUpload($request, 'image', 'uploads/post');   
       }
       else{
           $postImage = $post->image;
       } 
        $post->title =$request->title;
        $post->slug =$slug;
        $post->date =$request->date;
        $post->short_details =$request->short_details;
        $post->description =$request->description;
        $post->saved_by = Auth::user()->id;
        $post->image = $postImage;
        $post->save();

       if($post){
           return redirect()->route('post.index')->with('success','Post added successfully');
            
        }else{
            return back()->with('error','Post added fail');
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
    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' =>'required|string|min:3|max:100',
            'date' =>'required|date',
            'short_details' =>'required|string|max:120',
            'image' =>'Image|mimes:jpg,png,jpeg,bmp'
       ]);
     
       $post = Post::where('slug',$slug)->first();
       $postImage ='';
       if($request->hasFile('image')){
            if(!empty($post->image) && file_exists($post->image)){
                unlink($post->image);
            }
            $postImage = $this->imageUpload($request, 'image', 'uploads/post');   
       }
       else{
           $postImage = $post->image;
       }  
        $slug = trim($this->linkup_slug($request->title), '-');
        $post->title =$request->title;
        $post->slug =$slug;
        $post->date =$request->date;
        $post->short_details =$request->short_details;
        $post->description =$request->description;
        $post->image =$postImage;
        $post->updated_by = Auth::user()->id;
        $post->save();

        if($post){
            return redirect()->route('post.index')->with('success','Post updated successfully');
             
         }else{
             return back()->with('error','Post updated fail');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(!empty($post->image) && file_exists($post->image)){
            unlink($post->image);
        }
        $post->delete();
        if($post){
            return back()->with('success','Post deleted successfully');
        }
        else{
            return back()->with('success','Post deleted fail');
        }   
    }
}
