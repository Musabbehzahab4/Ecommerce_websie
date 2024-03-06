<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Auth;
use Str;

class SubcategoryController extends Controller
{
   public function subcategory()
   {
    if (Auth::User()->user_type == 0) {
        $subcategory = Subcategory::with('category')->get();
        return view('admin.subcategory',compact('subcategory'));
    }else {
        return redirect('/');
    }
   }
   public function subcategform()
    {
        $category = Category::all();
        $title = 'Add a new SubCategory';
        $url = '/subcategory/savesubcategory';
        return view('admin.subcategory-form', compact('title', 'url','category'));
    }
    public function savesubcategory(Request $request)
    {
        $subcategory = new Subcategory;
        $subcategory->title = $request['name'];
        $subcategory->category_id = $request['category'];
        $subcategory->slug = Str::slug($request->name);

        $subcategory->save();
        return redirect('/subcategory');
    }
    public function edit($slug)
    {
        $subcategory = Subcategory::where('slug',$slug)->first();
        $category = Category::all();

        if(is_null($subcategory)){
            return redirect()->back();
        }else{
            $title = 'Update SubCategory';
            $url = '/subcategory/updatesubcategory'.'/'.$slug;
            return view('admin.subcategory-form',compact('title','subcategory','url','category'));
        }
    }
    public function update(Request $request,$slug)
    {
        $subcategory = Subcategory::where('slug',$slug)->first();

        $subcategory->title = $request['name'];
        $subcategory->category_id = $request['category'];
        $subcategory->slug = Str::slug($request->name);
        $subcategory->save();
        return redirect('/subcategory');

    }
    public function delete($slug)
    {
        $subcategory = Subcategory::where('slug',$slug)->first();
        if(!is_null($subcategory)){
            $subcategory->delete();
            return redirect('/subcategory');
        }else{
            return redirect('/subcategory');
        }

    }
}
