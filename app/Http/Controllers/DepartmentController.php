<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\store;
use Illuminate\Support\Facades\Auth;
use DB;
class DepartmentController extends Controller
{
    
    public function addcategory(Request $req){
        $dep = new department;
        
        $fields = $req->validate([
            'description' => 'required|string',
            'name' => 'required|string',
            'image' => 'required',
            'type' => 'string',
            'keywords' => 'string',
            'status' => 'required',
            'popular' => 'required',
            'status' => 'required',


        //   'store_id'=>'required'

        ]);
       $id= Auth::id();
       $dep = department::create([
        'description' => $fields['ndescriptioname'],
        'name' => $fields['name'],
        'type' => $fields['type'],
        'image' => $fields['image'],
        'keywords' => $fields['keywords'],
        'status' => $fields['status'],
        'popular' => $fields['popular'],

     ]);
         $dep-> store_id = Auth::id();
       
        //$token = $user->createToken('myapptoken')->plainTextToken;
        $dep->save();

        $response = [
            'user' => $dep
        ];

        return response($response, 201);


    }
    public function deletcategoryById(Request $req){
        $userid = $req->input('department_id');
            DB::table('departments')->where('department_id', '=', $userid)->delete();
            return response()->json([
                'Message'=>'Deleted'
            ]);
        }
  
}
