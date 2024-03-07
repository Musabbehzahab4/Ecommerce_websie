<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $order = Order::all();
        return view('admin.order',compact('order'));
    }
}
