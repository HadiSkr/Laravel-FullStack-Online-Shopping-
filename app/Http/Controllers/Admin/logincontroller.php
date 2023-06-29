<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function AdminLogin(Request $request) {
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

        //$token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
           
             'user' => $user,
            //'token' =>  $user->createToken(time())->plainTextToken,
        ];

        return response($response, 201);
    }
    
}
