<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\store;
use Illuminate\Support\Facades\Auth;
use DB;
class ProductController extends Controller
{

  public function addproduct(Request $request){
    $user = new product;
    
    $fields = $request->validate([
        'specification' => 'required|string',
        'price' => 'required',
        'name' => 'required',
        'image' => 'required|string',
        'department_id' => 'required',
       // 'store_id' => 'required',


    ]);
    $id= Auth::id();
    
     $user = product::create([
        'specification' => $fields['specification'],
        'price' => $fields['price'],
        'name' => $fields['name'],
        'image' => $fields['image'],
        'department_id' => $fields['department_id'],
       'store_id' => $id,
     ]);


    $response = [
        'user' => $user,
    ];

    return response($response, 201);


}

public function deleteproductById(Request $req){
  $id= Auth::id();
  $userid = $req->input('productid');
      DB::table('products')->where('productid', '=', $id)->delete();
      return response()->json([
          'Message'=>'Deleted'
      ]);
  }
    public function getproductr(Request $req){
        $productid= $req->input('productid');
        
        $getproducts = DB::table('products')->where('productid','=',$productid)->get();
        
        return response()->json([
          "Result"=>$getproducts
        ]);
    }
}
