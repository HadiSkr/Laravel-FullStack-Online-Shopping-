<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class depcontroller extends Controller
{

    public function index(){
        $department = department::all();
        return view('admin.category.index', compact('department'));
    }

    public function edit($department_id){
        $department = department::find($department_id);
        return view('admin.category.edit', compact('department'));

    }


    public function update(Request $req, $department_id){
        $dep = department::find($department_id);
        if($req-> hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$department->img;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req-> file('img');
            $ext = $file-> getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file -> move('assets/uploads/category/',$filename);
            $dep->img = $filename;
        }
        $dep->status = $req->input('status') == TRUE? '1':'0';
        $dep->popular = $req->input('popular') == TRUE? '1':'0';
        $dep->keywords = $req->input('keywords');
        $dep->description = $req->input('description');
        $dep->name = $req->input('name');
        $dep->type = $req->input('type');
        $dep->keywords = $req->input('keywords');  
        $dep->update();
         return redirect('dashboard')->with("status", "category updated successfully" );
    }



    public function add(){
        return view('admin.category.add');
    }



    public function addcategory(Request $req){
        $department = new department;
        if ( $req-> hasFile('img'))
        {
            $file = $req-> file('img');
            $ext = $file-> getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file -> move('assets/uploads/category/',$filename);
            $department->img = $filename;
        }
        $department->status = $req-> input('status') == TRUE? '1':'0';
        $department->popular = $req-> input('popular') == TRUE? '1':'0';
        $department->keywords = $req-> input('keywords');
        $department->description = $req-> input('description');
        $department->name = $req-> input('name');
        $department->type = $req-> input('type');

       /* $fields = $req->validate([
            'description' => '',
            'name' => '',
            'type' => '',
            //'image' => '',
          //  'keywords' => ''
        ]);
       
      
         $department = department::create([
            'description' => $fields['description'],
            'name' => $fields['name'],
            'type' => $fields['type'],
          //  'image' => $fields['image'],
           // 'keywords' => $fields['keywords'],

         ]);*/
         //$dep-> store_id =Auth::id();
        //$token = $user->createToken('myapptoken')->plainTextToken;
        $department-> save();


        return redirect('/dashboard')->with('status', "category added successfully");


    }
    public function deletcategoryById(Request $req){
        $userid = $req->input('department_id');
            DB::table('departments')->where('department_id', '=', $userid)->delete();
            return response()->json([
                'Message'=>'Deleted'
            ]);
        }
        public function destroy($department_id, Request $req){
            $dep = department::find($department_id);
            if($req-> hasFile('image'))
            {
                $path = 'assets/uploads/category/'.$department->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $dep->delete();
            return redirect('categories')->with("status", "category deleted successfully" );
        }
}
