<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
      * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $data = array(
            'posts' => $user->posts->sortByDesc('created_at'),
            'recipes' => $user->recipes->sortByDesc('created_at')
        );
        //How do I sort the user blog posts by created_at desc?
        //$sorted_posts = $user->posts->sortBy('created_at');
        //return view('dashboard')->with('posts', $user->posts);
        //return view('dashboard')->with('posts', $user->posts->sortByDesc('created_at'));
        return view('dashboard')->with($data);
    }
}
