<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function brand()
   {
    if (Auth::check()) {
        if(Auth::User()->user_type == 0){
            $brand = Brand::all();
            return view('admin.brand',compact('brand'));
        }else {
            return redirect('/');
        }
    }else{
        return redirect('/login');
    }
   }
   public function brandform()
   {
    $title = 'Add Brand';
    $url = '/brand/savebrand';
    return view('admin.brand-form',compact('title','url'));
   }
   public function savebrand(Request $request)
   {
    $brand = new Brand;
    $brand->name = $request['name'];
    $brand->save();
    return redirect('/brand');
   }
   public function edit($id)
   {
    $brand = Brand::where('id',$id)->first();
    if(is_null($brand)){
        return redirect()->back();
    }else{
        $title = 'Update Brand';
        $url = '/brand/updatebrand' . '/' . $id;
        return view('admin.brand-form',compact('title','url','brand'));
    }
   }

   public function update(Request $request,$id)
   {
    $brand = Brand::where('id',$id)->first();
    $brand->name = $request['name'];
    $brand->save();
    return redirect('/brand');

   }
   public function delete($id)
   {
    $brand = Brand::where('id',$id)->first();
    if(!is_null($brand)){
        $brand->delete();
        return redirect('/brand');
    }else{
        return redirect('/brand');
    }
   }

}
