<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Auth;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function color()
    {
        if (Auth::check()) {
            if (Auth::User()->user_type == 0) {
                $color = Color::all();
                return view('admin.color',compact('color'));
            }else {
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    public function colorform()
    {
        $title = "Add Color";
        $url = "/color/savecolor";
        return view('admin.color-form',compact('title','url'));
    }
    public function savecolor(Request $request)
    {
        $color = new Color;
        $color->name = $request['name'];
        $color->save();
        return redirect('/color');
    }
    public function edit($id)
    {
        $color = Color::where('id',$id)->first();
        if(is_null($color))
        {
            return redirect('/color');
        }else{
            $title = 'Update Color';
            $url = '/color/updatecolor'.'/'.$id;
            return view('admin.color-form',compact('title','url','color'));
        }
    }
    public function update(Request $request,$id)
    {
        $color = Color::where('id',$id)->first();
        $color->name = $request['name'];
        $color->save();
        return redirect('/color');
    }
    public function delete($id)
    {
        $color = Color::where('id',$id)->first();
        if(!is_null($color)){
            $color->delete();
            return redirect('/color');
        }else{
            return redirect('/color');
        }
    }
}
