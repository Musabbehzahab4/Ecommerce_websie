<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::get();
        return view('admin.category', compact('category'));
    }

    public function categform()
    {
        $title = 'Add a new Category';
        $url = '/savecategory';
        return view('admin.category-form', compact('title', 'url'));
    }
    public function savecategory(Request $request)
    {
        $category = new Category;
        $category->title = $request['name'];
        $category->slug = Str::slug($request->name);

        $category->save();
        return redirect('/');
    }
    public function edit($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if (is_null($category)) {
            return redirect()->back();
        } else {
            $title = 'Update Category';
            $url = '/updatecategory' . '/' . $slug;
            return view('admin.category-form', compact('title', 'url','category'));
        }
    }
    public function update(Request $request,$slug)
    {
        $category = Category::where('slug',$slug)->first();
        // return $category;die;
        $category->title = $request['name'];
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('/');

    }
    public function delete($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if(!is_null($category)){
            $category->delete();
            return redirect('/');
        }else{
            return redirect('/');
        }

    }
}
