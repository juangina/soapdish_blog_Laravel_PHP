<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to the Soap Dish!';
        return view('pages.index', compact('title'));
    }
    public function about() {
        $title = 'This is all About Me!';
        return view('pages.about')->with('title', $title);
    }
    public function services() {
        $data = array(
            'title' => 'I Love to provide these Services!',
            'services' => ['Web Maintenance', 'Web Design', 'Database Design']
        );
        return view('pages.services')->with($data);
    }
}
