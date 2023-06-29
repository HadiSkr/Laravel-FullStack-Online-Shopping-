<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\product;
use Illuminate\Support\Facades\File;


class productcontroller extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('admin.product.index', compact('products'));

    }
    public function add()
    {        
        $department = department::all();
        return view('admin.product.add', compact('department'));

    }
    public function edit($productid){
        $product = product::find($productid);
        return view('admin.product.edit', compact('product'));

    }
    public function insert(Request $req){
        $product = new product;
        if($req-> hasFile('image'))
        {
            
            $file = $req-> file('image');
            $ext = $file-> getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file -> move('assets/uploads/products/',$filename);
            $product->image = $filename;
        }
        $product->status = $req->input('status') == TRUE? '1':'0';
        $product->trending = $req->input('trending') == TRUE? '1':'0';
        $product->original_price = $req->input('original_price');
        $product->name = $req->input('name');
        $product->selling_price = $req->input('selling_price');
        $product->Specification = $req->input('Specification');
        $product->quantity = $req->input('quantity');
        $product->disc = $req->input('disc');
        $product->keys = $req->input('keys');
        $product->department_id = $req->input('dep_id');


       /* $fields = $req->validate([
        //'original_price' =>'',
        'specification' => '',
        'selling_price' => '',
        'quantity' => '',
        'keywords' => '',
        'name' => '',
        'department_id' => '',
        'image' => '',
        ]);
      
         $product = product::create([
           // 'original_price' => $fields['original_price'],
            'specification' => $fields['specification'],
            'selling_price' => $fields['selling_price'],
            'quantity' => $fields['quantity'],
            'keywords' => $fields['keywords'],
            'name' => $fields['name'],
            'department_id' => $fields['department_id'],
            'image' => $fields['image'],
         ]);*/
         
         $product->save();
         return redirect('dashboard')->with("statucs", "product added successfully" );


    }
    public function update(Request $req, $productid)
    {
        $product = product::find($productid);
        if($req-> hasFile('image'))
        {
            $path = 'assets/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req-> file('image');
            $ext = $file-> getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file -> move('assets/uploads/products/',$filename);
            $product->image = $filename;
        }
        $product->status = $req->input('status') == TRUE? '1':'0';
        $product->trending = $req->input('trending') == TRUE? '1':'0';
        $product->original_price = $req->input('original_price');
        $product->name = $req->input('name');
        $product->selling_price = $req->input('selling_price');
        $product->Specification = $req->input('Specification');
        $product->quantity = $req->input('quantity');
        $product->disc = $req->input('disc');
        $product->keys = $req->input('keys');
        $product->update();
        return redirect('products')->with("status", "product updated successfully" );

    }
    public function destroy($productid, Request $req){
        $product = product::find($productid);
        if($req-> hasFile('image'))
        {
            $path = 'assets/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('products')->with("status", "product deleted successfully" );
    }
}
