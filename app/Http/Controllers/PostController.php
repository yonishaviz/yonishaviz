<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {
        $postss = Post::all();
        return view('posts.post')-> with('postss',$postss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=>'image|nullable|max:1999'

        ]);
        if($request->hasFile('cover_image')){
    $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
    
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    
    $fileNameToStore = $filename .'_'.time().'.'.$extension;
    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            
            
        }
       else{
        $fileNameToStore = 'noimage.jpeg';   
           
       }
        $post = new Post;
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->user_id= auth()-> user()->id;
               $post->cover_image = $fileNameToStore;

        $post->save();
        return redirect ('/posts')->with('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $post = post:: find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $post = post:: find($id);
        if(auth()-> user()->id !== $post->user_id){
            
            return redirect('/posts')->with('error','unuthorized page');
        }
        return view('posts.edit')->with('post',$post);

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
         'cover_image'=>'image|nullable|max:1999'

        ]);
    
       if($request->hasFile('cover_image')){
    $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
    
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    
    $fileNameToStore = $filename .'_'.time().'.'.$extension;
    $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
                
        }
      
        
         $post = post:: find($id);
        $post->title= $request->input('title');
        $post->body= $request->input('body');
                if($request->hasFile('cover_image')){
     $post->cover_image = $fileNameToStore;}
        $post->save();
        return redirect ('/posts')->with('success','post updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = post:: find($id);
$post ->delete();
          return redirect ('/posts')->with('success','post removed');      
    }
}
