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
use Auth;
use Str;

class ProductController extends Controller
{
    public function product()
    {
        if(Auth::check()){
            if (Auth::User()->user_type == 0) {
                $product = Product::with('category', 'subcategory', 'brand', 'colors')->get();
                return view('admin.product', compact('product'));
            }else {
                return redirect('/');
            }
        }else {
            return redirect('/login');
        }
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

        return view('admin.product-form', compact('title', 'url', 'category', 'subcategory', 'brand', 'size', 'color'));
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


        $size = $request['size'];
        $product_id = $product->id;
        foreach ($size as $size) {
            $new_size = new Product_size;
            $new_size->size_id = $size;
            $new_size->product_id = $product_id;
            $new_size->save();
        }

        $color = $request['color'];
        $product_id = $product->id;
        foreach ($color as $color) {
            $new_color = new Product_color;
            $new_color->color_id = $color;
            $new_color->product_id = $product_id;
            $new_color->save();
        }

        return redirect('/product');

    }
    public function edit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $brand = Brand::all();
        $size = Size::all();
        $color = Color::all();
        $product_color = Product_color::where('product_id', $id)->get();
        $product_size = Product_size::where('product_id', $id)->get();

        $product = Product::where('id', $id)->first();
        $page = 'edit';
        if (is_null($product)) {
            return redirect()->back();
        } else {
            $title = 'Update Product';
            $url = '/product/updateproduct' . '/' . $id;
            return view('admin.product-form', compact('page', 'product', 'title', 'url', 'category', 'subcategory', 'brand', 'size', 'color', 'product_color', 'product_size'));
        }
    }

    public function update(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('students'), $imageName);

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


        $sizes = $request['size'];
        $product_id = $product->id;
        $delete_size = Product_size::where('product_id', $id)->delete();
        foreach ($sizes as $size) {
            $new_size = new Product_size;
            $new_size->size_id = $size;
            $new_size->product_id = $product_id;
            $new_size->save();
        }


        $color = $request['color'];
        $product_id = $product->id;
        $delete_color = Product_color::where('product_id', $id)->delete();
        foreach ($color as $color) {
            $new_color = new Product_color;
            $new_color->color_id = $color;
            $new_color->product_id = $product_id;
            $new_color->save();
        }
        return redirect('/product');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if (!is_null($product)) {
            $product->delete();
            Product_size::where('product_id',$id)->delete();
            Product_color::where('product_id',$id)->delete();
            return redirect('/product');
        } else {
            return redirect('/product');
        }
    }

    public function ajaxCall(Request $request)
    {
        $category = Subcategory::with('category')
            ->where('category_id', $request->category)
            ->get();
        return response()->json(['success' => true, 'data' => $category]);

    }

}
