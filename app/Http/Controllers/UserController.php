<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function about()
    {
        return view('user.about');
    }
    public function blog()
    {
        return view('user.blog_list');
    }
    public function products()
    {
        return view('user.product');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function testimonial()
    {
        return view('user.testimonial');
    }
}
