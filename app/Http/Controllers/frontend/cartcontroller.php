<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use DB;
class cartcontroller extends Controller
{
    
    public function AddToCart(Request $req){
        $productid = $req->input('productid');
        $quantity = $req->input('quantity');
       
        if(Auth::check())
        {
            $product_check = product::where('productid',$productid)->exists();
            if($product_check)
            {
                if(cart::where('productid',$productid)->where('user_id',Auth::id())->exists())
                {
                    $product = product::where('productid',$productid)->first();
                    return response()->json(['status'=>$product->name." already added to cart"]);                }
                else
                {
                    $cart = new cart;
                    /*$cart = cart::create([
                       'quantity' => $fields['quantity'],
                       'productid' => $fields['productid'],
                       'customerid' =>Auth::id(),
                    ]);*/
                    $cart->productid = $productid;
                    $cart->quantity = $quantity;
                    $cart->user_id = Auth::id();
                    $cart->save();
                    $product = product::where('productid',$productid)->first();

                    
                }
            }
        }
        else{
            return response()->json(['status'=>"log in to continue"]);

        }
    }
    
    public function viewcart()
    {
        $cartitems = cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

 public function deleteprod(Request $req)
 {
    if(Auth::check())
    {
    $prod_id = $req->input('productid');
    if(cart::where('productid',$prod_id)->where('user_id',Auth::id())->exists())
    {
        $cartitems = cart::where('productid',$prod_id)->where('user_id',Auth::id())->first();
        $cartitems-> delete();
        return response()->json(['status'=>"product deleted successfully"]);
    }

 }

else{
    return response()->json(['status'=>"log in to continue"]);

}
}
public function updatecart(Request $req)
    {
        
         $productid = $req->input('productid');
        $quantityy = $req->input('quantity');
        if(Auth::check())
        {
            if(cart::where('productid',$productid)->where('user_id',Auth::id())->exists())
          {
            $cart = cart::where('productid',$productid)->where('user_id',Auth::id())->first();
            $cart->quantity = $quantityy;
            $cart->update();
            return response()->json(['status'=>"Quantity Updated"]);

            }


        }
    }
}
