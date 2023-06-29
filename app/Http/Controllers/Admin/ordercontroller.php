<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\product;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
class ordercontroller extends Controller
{
    public function index()
    {
        $orders = order::where('status','0')->get();
        return view('admin.order.index',compact('orders'));
    }
    public function view($id)
    {
        $orders = order::where('orders_id',$id)->first();
       return view('admin.order.view', compact('orders'));

    }

    public function updateorder(Request $req, $orders_id)
    {
        $orders = order::find($orders_id);
        //$orders = order::find('orders_id',$orders_id);   
        $orders-> status = $req->input('Order_Status');
        $orders->update();
        return redirect('orders')->with('status',"Order Updated Successfully");
    }
    public function orderhistory()
    {
        $orders = order::where('status','1')->get();
        return view('admin.order.index',compact('orders'));
    }
}
