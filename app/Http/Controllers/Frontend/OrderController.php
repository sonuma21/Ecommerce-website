<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // return $request;
        $user = User::find(Auth::user()->id);
        $order = new Order();
        $order->total_amount = $request->total_amount;
        $order->shop_id = $request->shop_id;
        $order->user_id = $user->id;
        $order->status = 'pending';
        $order->payment_method = $request->payment_method;
        $order->save();

        $carts = [];
        foreach ($user->carts as $c) {
            if ($c->product->seller_id == $request->seller_id) {
                $carts[] = $c;
                $c->delete();
            }
        }

        foreach ($carts as $c) {
            $orderDescription = new OrderDescription();
            $orderDescription->order_id = $order->id;
            $orderDescription->product_id = $c->product_id;
            $orderDescription->quantity = $c->quantity;
            $orderDescription->amount = $c->amount;
            $orderDescription->save();
        }
        return redirect()->route('carts')->with('success', 'Order placed successfully!');
    }
}
