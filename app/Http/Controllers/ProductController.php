<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product_color;
use App\Models\Product_size;
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
      
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->image = $imageName;
        $product->save();

        $product_size = new Product_size;
        $size = $request['size'];
        $product_id = $product->id;
        $product_size->product_id= $product_id;
        $product_size->size_id=$size;
        $product_size->save();

        $product_color = new Product_color;
        $color = $request['color'];
        $product_id = $product->id;
        $product_color->product_id = $product_id;
        $product_color->color_id = $color;
        $product_color->save();

        return redirect('/product');

    }

}
