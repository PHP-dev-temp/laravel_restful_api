<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends Controller
{
    public function index(Request $request)
    {

        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        if (Auth::validate($credentials))
        {
            $users = User::all();
            foreach($users as $user) {
                if (Hash::check($request['password'], $user->password) && $request['email'] == $user->email){
                    return response()->json(['api' => $user->api_token], 200);
                }
            }
        }
        return response()->json(['error' => 'Invalid email or password!'], 400);
    }

    public function api_error(){
        return response()->json(['error' => 'Invalid api!!'], 400);
    }
}
