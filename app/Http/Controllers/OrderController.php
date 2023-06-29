<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\singleorder;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\User;
use DB;
class OrderController extends Controller
{
    
    public function makeorder(Request $req){
        $order = new order;
        $total = 0;

        $order->FirstName = $req->input('FirstName');
        $order->LastName = $req->input('LastName');
        $order->country = $req->input('country');
        $order->city = $req->input('city');
        $order->email = $req->input('email');
        $order->address2 = $req->input('address2');
        $order->phone = $req->input('phone');
        $order->address1 = $req->input('address1');
        $order->tracking_no = 'flower'.rand(1111,9999);
        $order->save();
        $order->user_id= Auth::id();
       $cartitems = cart::where('user_id', Auth::id())->get();
      
       foreach($cartitems as $item)
     {
       $pro = product::where('productid', $item->productid)->get('price');
        $obj = json_decode($pro[0], true);
        print($obj["price"]);
       singleorder::create([
        
            'orders_id' => $order-> orders_id,
            'productid' =>  $item-> productid,
            'price' =>  $obj["price"],
            'qty' => $item->quantity
        ]);
        $total += $obj["price"]*$item->quantity;
        $prod = product::where('productid',$item-> productid)->first();
        $prod->quantity= $prod->quantity - $item->quantity;
        $prod->update();
     }
     if(Auth::user()->address1==NULL)
     {
        $user = User::where('id', Auth::id())->first();
        $user->name = $req->input('FirstName');
        $user->LastName = $req->input('LastName');
        $user->country = $req->input('country');
        $user->city = $req->input('city');
        $user->address2 = $req->input('address2');
        $user->phone = $req->input('phone');
        $user->address1 = $req->input('address1');
        $user->update();
      
     }
     $order->total =$total;
     $order->save();
     $cartitems = cart::where('user_id',Auth::id())->get();
     cart::destroy($cartitems);
    
        $response = [
            'order' => $order,
        ];

        return response($response, 201);


    }
}
