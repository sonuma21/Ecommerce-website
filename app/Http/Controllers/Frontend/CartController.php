<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class CartController extends Controller
{
    public function carts(){
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('frontend.carts',compact('carts'));
    }
    public function add_to_cart(Request $request){
        $product = Product::find($request->product_id);
        if(!$product){
            return view('frontend.404');
        }
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->amount = $product->discount > 0? $product->price - ($product->price * $product->discount) * $request->quantity / 100 : $product->price * $request->quantity;
        $cart->save();

        toast("Added to the Cart Successfully","success" );
        return redirect()-> route('carts');




    }
}
