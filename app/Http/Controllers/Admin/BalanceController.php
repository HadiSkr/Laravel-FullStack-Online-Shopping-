<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BalanceController extends Controller
{
    public function index()
    {
        $users = User::all();
    
        return view('balance.index', compact('users'));
    }

    public function edit()
{
    $users = User::all();

    return view('balance.edit', compact('users'));
}

public function update(Request $request)
{
    foreach ($request->input('balance') as $user_id => $balance) {
        $user = User::find($user_id);
        $user->balance = $balance;
        $user->save();
    }

    return redirect()->route('balance.index')->with('success', 'Balances updated successfully.');
}

}
