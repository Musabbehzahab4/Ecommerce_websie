<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }
    public function productform()
    {
        $title = "Add Product";
        $url = '/product/saveproduct';
        return view('admin.product-form',compact('title','url'));
    }
    
}
