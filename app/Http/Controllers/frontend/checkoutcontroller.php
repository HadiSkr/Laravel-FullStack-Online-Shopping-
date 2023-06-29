<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\User;
use App\Models\singleorder;
use App\Models\order;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator; // Import Validator class
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use DB;


class checkoutcontroller extends Controller
{
    public function index()
    {
        $old_cartitems = cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
           if(!product::where('productid',$item->productid)->where('quantity','>=',$item->quantity)->exists())
           {
            $removeitem = cart::where('user_id',Auth::id())->where('productid','>=',$item->productid);
            $removeitem->delete();
           }
        }
        $cartitems = cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    }





    public function placeorder(Request $req)
{
    $total = 0;
    $cartitems = cart::where('user_id', Auth::id())->get();
    foreach($cartitems as $item) {
        $pro = product::where('productid', $item->productid)->get('selling_price');
        $obj = json_decode($pro[0], true);
        $total += $obj["selling_price"]*$item->quantity;
    }
    $balance = Auth::user()->balance;
    if ($total <= $balance) {
        $order = new order;
        $order->user_id = Auth::id();
        $order->FirstName = $req->input('FirstName');
        $order->LastName = $req->input('LastName');
        $order->country = $req->input('country');
        $order->city = $req->input('city');
        $order->email = $req->input('email');
        $order->address2 = $req->input('address2');
        $order->phone = $req->input('phone');
        $order->address1 = $req->input('address1');
        $order->tracking_no = 'flower'.rand(1111,9999);
        $order->total = $total;
        $order->save();
        $user = Auth::user();
        $user->balance = $user->balance - $total;
        $user->save();
        foreach($cartitems as $item) {
            $pro = product::where('productid', $item->productid)->get('selling_price');
            $obj = json_decode($pro[0], true);
            singleorder::create([
                'orders_id' => $order->orders_id,
                'productid' =>  $item->productid,
                'price' =>  $obj["selling_price"],
                'qty' => $item->quantity
            ]);
            $prod = product::where('productid',$item->productid)->first();
            $prod->quantity= $prod->quantity - $item->quantity;
            $prod->update();
        }
        $order->total = $total;
        $order->save();
        cart::destroy($cartitems);
        return redirect('/')->with('status', 'Order placed successfully');
    } 
    else {
        
        return redirect('cart')->with('error', '"You do not have enough balance to place this order"');
    }
}


}
