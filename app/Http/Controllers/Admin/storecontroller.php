<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\store;
use App\Models\product;
use DB;

class storecontroller extends Controller
{
    
    
    
        public function addstore(Request $req){
          $user = new store;
          $fields = $req->validate([
              'name' => '',
              'description' => '',
              'features' => '',
              'image' => '',
              'email' => '',
              'password' => '',
              'eval' => '',
              'location_id'=> ''
      
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
           
      
          $response = [
              'user' => $user,
          ];
      
          return response($response, 201);
      
      
      }
      public function addproduct(Request $request){
        $product = new product;
        
        
        $fields = $request->validate([
        'specification' => '',
        'price' => '',
        'name' => '',
        'image' => '',
        'department_id' => '',
        'store_id' => ''

        ]);
      
         $product = product::create([
            'specification' => $fields['specification'],
            'price' => $fields['price'],
            'name' => $fields['name'],
            'image' => $fields['image'],
            'store_id' => $fields['store_id'],
            'department_id' => $fields['department_id'],

         ]);
        


        $response = [
            'user' => $user,
        ];

        return response($response, 201);


    }

    public function deleteproductById(Request $req){
      $userid = $req->input('productid');
          DB::table('products')->where('productid', '=', $userid)->delete();
          return response()->json([
              'Message'=>'Deleted'
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
              'store_id' => 'required|integer'
  
          ]);
  
          //$getcomp = DB::table('products')->where('email','=', $email)->get('Post_Id');
  
          
          DB::table('products')->where('productid',$fields['productid'])->update(['specification'=>$fields['specification'],'price'=>$fields['price'],'name'=>$fields['name'],
          'image'=>$fields['image'],'store_id'=>$fields['store_id']]);
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
