<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\store;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use DB;

class StoreController extends Controller
{
  public function addstore(Request $req){
    $user = new store;
    $fields = $req->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'features' => 'string',
        'image' => 'string',
        'email' => 'required|string',
        'password' => 'required|string',
        'eval' => 'required|string',
        'location_id'=> 'integer'

    ]);
   
  
     $user = store::create([
        'name' => $fields['name'],
        'description' => $fields['description'],
        'password' => bcrypt($fields['password']),
        'features' => $fields['features'],
        'email' => $fields['email'],
        'image' => $fields['image'],
        'eval' => $fields['eval'],
        'location_id' => $fields['location_id']

     ]);
     
    //$token = $user->createToken('myapptoken')->plainTextToken;
    $token = $user->createToken('myapptoken')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);


}




public function storeLogin(Request $request) {
  $fields = $request->validate([
      'email' => 'required|string',
      'password' => 'required|string'
  ]);

  // Check email
  $user = store::where('email', $fields['email'])->first();

  // Check password
  if(!$user || !Hash::check($fields['password'], $user->password)) {
      return response([
          'message' => 'Bad creds'
      ], 401);
  }

  //$token = $user->createToken('myapptoken')->plainTextToken;
  $token = $user->createToken('myapptoken')->plainTextToken;

  $response = [
     
       'user' => $user,
      'token' =>  $token
  ];

  return response($response, 201);
}



    public function Getstore(Request $req){
         $store_id = $req->input('store_id');
       // $getcomp = DB::table('hotels')->where('store_id','=', $store_id)->get(' $store_id');
 
         $getProf = DB::table('stores')->where('store_id','=',$store_id)->get();
         return response()->json([
            'info'=> $getProf
            ]);
         }
         public function getstoreproductbyid(Request $req){
             $store_id= $req->input('store_id');
             
             $getproducts = DB::table('products')->where('store_id','=',$store_id)->get();
             
             return response()->json([
               "Result"=>$getproducts
             ]);
         }

         
      
      public function editproductinfo(Request $req){

          $user = new product;
                 
          $fields = $req->validate([

              'specification' => 'required|string',
              'price' => 'required|integer',
              'name' => 'required|string',
              'image' => 'required|string',
              'productid' => 'required|integer',
              
  
          ]);
  $id= Auth::id();
  
          
          DB::table('products')->where('productid',$id)->update(['specification'=>$fields['specification'],'price'=>$fields['price'],'name'=>$fields['name'],
          'image'=>$fields['image']]);
          return response()->json([
            "Message"=>"Updated"
          ]);
      }
      
    public function deletstoreById(Request $req){
     
          DB::table('stores')->where('store_id', '=', Auth::id())->delete();
          return response()->json([
              'Message'=>'Deleted'
          ]);
      }

}
