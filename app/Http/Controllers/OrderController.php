<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $order = Order::all();
        return view('admin.order',compact('order'));
    }
    public function detail($id)
    {
        $orderdetail = OrderDetail::where('user_id',$id)->get();
       
        return view('admin.orderdetail',compact('orderdetail'));
    }
}
