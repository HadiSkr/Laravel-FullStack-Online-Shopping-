<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\department;
use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    public function index()
    {
        $featured_product = product::where('trending','1')->take(15)->get();
        $Trending_product = department::where('popular','1')->take(15)->get();
        return view('frontend.index', compact('featured_product','Trending_product'));
    }
    public function category()
    {
        $category = department::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($department_id)
    {
        if(department::where('department_id',$department_id)->exists())
        {
           $category = department::where('department_id',$department_id)->first();
           $products = product::where('department_id',$category->department_id)->where('status','0')->get();
           return view('frontend.products.index', compact('products','category'));
        }
        else{
            return redirect('/')->with('status',"id doesnot exist");
        }
    }
    public function productview($department_id,$productid)
    {
        if(department::where('department_id',$department_id)->exists())
        {
            if(product::where('productid',$productid)->exists())
        {
            $product = product::where('productid',$productid)->first();
            return view('frontend.products.view', compact('product'));
        }
        else{
            return redirect('/')->with('status', "the link was broken");
        }
        }
        else{
            return redirect('/')->with('status', "no such category found");

        }
        
    }
}
