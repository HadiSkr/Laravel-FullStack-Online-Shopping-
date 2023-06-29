<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;
use App\Models\singleorder;
use DB;
class CustomerController extends Controller
{
    public function UserRegister(Request $req){
        $customer = new customer;
       

        $fields = $req->validate([
            'firstname' => 'required|string',
            'lastname' => 'string',
            'email' => '',
            'password' => 'required',
            'image' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required',
            'birthdate' => 'required|date',
            'location_id' => 'required'
            

        ]);
      
        
         $customer = customer::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'password' => bcrypt($fields['password']),
            'email' => $fields['email'],
            'image' => $fields['image'],
            'gender' => $fields['gender'],
            'birthdate' => $fields['birthdate'],
            'phone' => $fields['phone'],
            'location_id' => $fields['location_id']

         ]);
        

        $token = $customer->createToken('myapptoken')->plainTextToken;

        $customer->save();
        return response()->json([
            $customer,
            'token' => $token
        
        ]);
    }

    












    public function showproduct(Request $req){
        $customer = new customer;
      

        $fields = $req->validate([
            'firstname' => 'required|string',
            'lastname' => 'string',
            'email' => '',
            'password' => 'required',
            'image' => 'required|string',
            //'address' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|integer',
            'birthdate' => 'required|date',
            'location_id' => ''
            

        ]);
      
      
         $customer = customer::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'password' => bcrypt($fields['password']),
            'email' => $fields['email'],
            'image' => $fields['image'],
            'gender' => $fields['gender'],
            //'address' => $fields['address'],
            'birthdate' => $fields['birthdate'],
            'phone' => $fields['phone'],
            'location_id' => $fields['location_id']

         ]);
        

        //$token = $user->createToken('myapptoken')->plainTextToken;

        $customer->save();
        return response()->json([
            'Message'=> 'Success'
        ]);
    }
   
    
    public function UserLogin(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = customer::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
           
             'user' => $user,
             'token' => $token
            //'token' =>  $user->createToken(time())->plainTextToken,
        ];

        return response($response, 201);
    }
  /*  public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }*/

  /*  public function makesingleorder(Request $req){
        $user = new singleorder;
        $fields = $req->validate([
            'price' => 'required',
            'customerid' => 'required',
            'productid' => 'required'

           

        ]);
       
      
         $user = singleorder::create([
            'price' => $fields['price'],
            'customerid' => $fields['customerid'],
            'productid' => $fields['productid'],

         ]);
       
        //$token = $user->createToken('myapptoken')->plainTextToken;
        $user->save();
        $response = [
            'user' => $user,
        ];

        return response($response, 201);


    }
*/

/* public function customercart(Request $req){
            $customerid= $req->input('customerid');
            
            $getorder = DB::table('singleorders')->where('customerid','=',$customerid)->first()->productid;
            $getproducts = DB::table('products')->where('productid','=',$getorder)->get();

            return response()->json([
              "Result"=>$getproducts
            ]);
        }*/



}
