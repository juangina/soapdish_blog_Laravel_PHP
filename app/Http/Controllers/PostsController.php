<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - READ ITEMS//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(4);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CRUD - CREATE EDITOR//////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CRUD - CREATE STORE//////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            // Get filename with the extension with a laravel-file() function and a laravel-get...() function
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename using a php function pathinfo()
            // BradTravesy did not find a laravel function that extracts the name only, hence using php
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext using a laravel-file() function and a laravel-get...() function
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store with a "unique" timestamp appended to the original client filename
            // This ensures that each filename uploaded is unique because time is unique at that moment
            // This uses a php-time() function
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image with laravel-file() and laravel-storeAs() functions
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		
	        // make thumbnails
	        //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('cover_image')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/cover_images/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        //return redirect('/posts')->with('success', 'Post Created');
        return redirect('/dashboard')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - READ ITEM//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - UPDATE EDITOR/////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }
        //value returned from postgres database is a string reprentation of the user_id
        //The auth() function represents the user id as an integer.
        //This has to converted to string to make the comparison work
        $str_id = strval(auth()->user()->id);
        //var_dump($str_id);
        $_userid = $post->user_id;
        //var_dump($_userid);

        // Check for correct user
        if($str_id !== $_userid){
            
            //return redirect('/posts')->with('error', 'Unauthorized Page:'.' id: '.$_id.' userid '.$_userid);
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - UPDATE STORE//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
		$post = Post::find($id);
         //Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_images/'.$post->cover_image);
		
            //Make thumbnails
            //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('cover_image')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/cover_images/'.$thumbStore);
        }

        // Update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        //return redirect('/posts')->with('success', 'Post Updated');
        return redirect('/dashboard')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - DELETE ITEM//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        //Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}