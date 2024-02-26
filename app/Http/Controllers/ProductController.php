<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use Str;

class ProductController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }
    public function productform()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $brand = Brand::all();
        $size = Size::all();
        $color = Color::all();
        $title = "Add Product";
        $url = '/product/saveproduct';
        return view('admin.product-form',compact('title','url','category','subcategory','brand','size','color'));
    }
    public function saveproduct(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('students'), $imageName);

        $product = new Product;
        $product->name = $request['name'];
        $product->slug = Str::slug($request->name);
        $product->category_id = $request['category'];
        $product->subcategory_id = $request['subcategory'];
        $product->brand_id = $request['brand'];
        $product->size_id = $request['size'];
        $product->color = $request['color'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->image = $imageName;
        $product->save();
        return redirect('/product');

    }

}
