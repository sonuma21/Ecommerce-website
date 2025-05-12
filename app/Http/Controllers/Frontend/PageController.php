<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $offer_products = Product::where('stock',true)->where('discount','>',0)->get();
        $all_products = Product::where('stock',true)->get();
        $shop_profiles = ShopProfile::all();
        return view('frontend.home', compact('offer_products','shop_profiles','all_products'));
    }
    public function store_request(Request $request)
    {
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->email = $request->email;
        $shop->password = Hash::make(rand(10000,99999));
        $shop->save();

        $profile = new ShopProfile();
        $profile->shop_id = $shop->id;
        $profile->shop_name = $request->shop_name;
        $profile->address = $request->shop_address;
        $profile->save();
        Mail::to('phangmalmb@gmail.com')->send(new EmailNotification());

        toast("Request sent Successfully","success" );
        return redirect()->route('home');



    }

    public function compare(Request $request){
        $q = $request->q;
        $results = Product::where('name','like',"%$q%")->OrderBy('price','asc')->get();
        return view('frontend.compare',compact('results','q'));
    }

public function product($id){
    $product = Product::find($id);
    if(!$product){
        return view('frontend.404');
    }
    return view('frontend.product', compact('product'));
}
public function notFound(){
    return view('frontend.404');
}
}
