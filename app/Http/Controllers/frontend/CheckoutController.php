<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        return view('frontend.checkout', compact('cartItems'));
    }
    public function checkout(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51OrZ7BKdCUkn2byaSn1Gdm3DwDgrOn0bL1wizFPQNCfE4m7cniWCflIYCKVijTC9vIT0OM0b39OukYYeRdezWjOe00fjp5T8xG');

        $cartItems = \Cart::getContent();

        $lineItems = [];
        $totalPrice = 0;

        foreach ($cartItems as $product) {
            $totalPrice = \Cart::getTotal();

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        // 'images' => $product['attributes']['image'],
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->quantity,
            ];

            $user = Auth::id();
            $orderdetail = new OrderDetail;
            $orderdetail->user_id = $user;
            $orderdetail->product_id = $product['id'];
            $orderdetail->name = $product['name'];
            $orderdetail->price = $product['price'];
            $orderdetail->quantity = $product['quantity'];
            $orderdetail->image = $product['attributes']['image'];
            $orderdetail->save();
        }
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel', [], true),
        ]);

        $user = Auth::id();
        $order = new Order;
        $order->session_id = $session->id;
        $order->user_id = $user;
        $order->fname = $request['fname'];
        $order->lname = $request['lname'];
        $order->address = $request['address'];
        $order->email = $request['email'];
        $order->phone_no = $request['phone_no'];
        $order->country = $request['country'];
        $order->status = 'unpaid';
        $order->total_price = $totalPrice;
        $order->save();
        return redirect($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51OrZ7BKdCUkn2byaSn1Gdm3DwDgrOn0bL1wizFPQNCfE4m7cniWCflIYCKVijTC9vIT0OM0b39OukYYeRdezWjOe00fjp5T8xG');

        $sessionId = $request->get('session_id');
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            } else {



                $order = Order::where('session_id', $session->id)->first();
                if (!$order) {
                    throw new NotFoundHttpException();
                } else {

                    $order->status = 'paid';
                    $order->save();
                    \Cart::clear();
                    return view('frontend.thankyou');

                }
            }

        } catch (\Throwable $th) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {

    }

}
