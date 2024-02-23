<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
public function size()
{
    $size = Size::all();
    return view('admin.size',compact('size'));
}
public function sizeform()
{
    $title = 'Add Size';
    $url = '/size/savesize';
    return view('admin.size-form',compact('title','url'));
}
public function savesize(Request $request)
{
    $size = new Size;
    $size->name = $request['name'];
    $size->save();
    return redirect('/size');
}
public function edit($id)
{
    $size = Size::where('id',$id)->first();
    if(is_null($size)){
        return redirect('/size');
    }else{
        $title = "Update Size";
        $url = "/size/updatesize"."/".$id;
        return view('admin.size-form',compact('size','title','url'));
    }
}
public function update(Request $request,$id)
{
    $size = Size::where('id',$id)->first();
    $size->name = $request['name'];
    $size->save();
    return redirect('/size');
}
public function delete($id)
{
    $size = Size::where('id',$id)->first();
    if(!is_null($size)){
        $size->delete();
        return redirect('/size');
    }else{
        return redirect('/size');
    }
}
}
