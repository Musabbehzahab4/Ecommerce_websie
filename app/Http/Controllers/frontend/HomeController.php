<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('frontend.index',compact('product'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function products()
    {
        $product = Product::get();
        return view('frontend.product',compact('product'));
    }
    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function cart()
    {
        $product = Product::get();
        return view('frontend.cart',compact('product'));
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}
