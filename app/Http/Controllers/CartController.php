<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use DB;
class CartController extends Controller
{
    public function AddToCart(Request $req){
        $cart = new cart;
       

        $fields = $req->validate([
            'quantity' => 'required|integer',
            'productid' => 'required|integer',
            'customerid'=> 'required|integer'

        ]);
      
        
         $cart = cart::create([
            'quantity' => $fields['quantity'],
            'productid' => $fields['productid'],
            'customerid' => $fields['customerid'],
           
         ]);
        


        $cart->save();
        return response()->json([
            'Message'=> 'Success'
        ]);
    }


    public function showcustomercart(Request $req){
    
        $customerid= $req->input('customerid');
            
        $getorder = DB::table('carts')->where('customerid','=',$customerid)->first()->productid;
        $getproducts = DB::table('products')->where('productid','=',$getorder)->get();

        return response()->json([
          "Result"=>$getproducts
        ]);



    }
}
