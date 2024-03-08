<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        if(Auth::check()){
            if (Auth::User()->user_type == 0) {
                $order = Order::all();
                return view('admin.order',compact('order'));
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
    }
    public function detail($id)
    {
        $orderdetail = OrderDetail::where('user_id',$id)->get();
        return view('admin.orderdetail',compact('orderdetail'));
    }
}
