<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use App\Models\Image;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - READ ITEM//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     public function show($id)
     //public function show(Image $image)
     {
         $post = Post::find($id);
         return view('posts.show')->with('post', $post);
         //return Storage::disk('s3')->response('public/cover_images/'.$image->filename);
         //return $image->url;
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
        //var_dump($id);
        //print_r($str_id); 
        //die();
        //die('<pre>'. var_dump($str_id));
        $post = Post::find($id);
        
        //Check if post exists before editing
        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }
        //The auth()->user()->id value returned from postgres database is a string reprentation of the user_id
        //The auth() function represents the user id as an integer.
        //This has to converted to string to make the comparison work
        //This phenomenon happens on the local development server
        //On the heroku production server, it is a proper integer
        //var_dump(auth()->user()->id);
        
        //$str_id = strval(auth()->user()->id);
        //var_dump($str_id);
        //print_r($str_id); 
        //die();
        //die('<pre>'. var_dump($str_id));

        
        //$_userid = $post->user_id;
        //var_dump($_userid);
        //print_r($_userid);
        //die();
        //die('<pre>'. var_dump($_userid));

        // Check for correct user
        //if($str_id !== $_userid){
        /*if(auth()->user()->id !== $post->user_id) {
            //return redirect('/posts')->with('error', 'Unauthorized Page:'.' id: '.$_id.' userid '.$_userid);
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }*/

        return view('posts.edit')->with('post', $post);
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
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore, 's3');
            echo $path;

            Storage::disk('s3')->setVisibility($path, 'public');
		
	        // make thumbnails
	        //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('cover_image')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/cover_images/'.$thumbStore);
		
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $post->cover_image = Storage::disk('s3')->url($path);
        } else {
            $post->cover_image = 'https://soapdish.s3.amazonaws.com/public/cover_images/pexels-taryn-elliott-4426556+(Large).jpg';
        }
        $post->save();

        //return redirect('/posts')->with('success', 'Post Created');
        return redirect('/dashboard')->with('success', 'Post Created');
        //return $image;
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

            // Upload Image to S3 Bucket on AWS
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore, 's3');

            // Delete existing image on disk
            if($post->cover_image != 'https://soapdish.s3.amazonaws.com/public/cover_images/pexels-taryn-elliott-4426556+(Large).jpg') {
                Storage::disk('s3')->delete($post->cover_image);
            }
            

            Storage::disk('s3')->setVisibility($path, 'public');
		
            //Make thumbnails
            //$thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            //$thumb = Image::make($request->file('cover_image')->getRealPath());
            //$thumb->resize(80, 80);
            //$thumb->save('storage/cover_images/'.$thumbStore);
        }

        // Update Post in Database
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            //$post->cover_image = $fileNameToStore;
            $post->cover_image = Storage::disk('s3')->url($path);
        }
        $post->save();

        //return redirect('/posts')->with('success', 'Post Updated');
        return redirect('/dashboard')->with('success', 'Post Updated');


        

        //$image = Image::create([
            //'filename' => basename($path),
            //'url' => Storage::disk('s3')->url($path)
        //]);
        //return $image;
        // For a route with the following URI: posts/{image}
        //return redirect('/posts')->with('success', 'Post Created');
        //Example1: return redirect('states/'.$id.'/regions')
        //Example2: return redirect()->route('posts', [$image]);
        //return redirect('posts/'.$image);
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
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::disk('s3')->delete($post->cover_image);;
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}