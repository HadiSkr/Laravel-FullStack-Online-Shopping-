<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\singleorder;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\User;
class usercontroller extends Controller
{
    public function index()
    {
        $orders = order::where('user_id',Auth::id())->get();
       return view('frontend.orders.index', compact('orders'));
    }
    public function view($id)
    {
        $orders = order::where('orders_id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view', compact('orders'));
     }
}
