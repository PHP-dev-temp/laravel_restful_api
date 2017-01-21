<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiUserController extends Controller
{
    public function login(Request $request)
    {
	// grab credentials from the request
	    $credentials = $request->only('email', 'password');
	    if (Auth::validate($credentials))
	    {
	        $users = User::all();
	        foreach($users as $user) {
	            if (Hash::check($request['password'], $user->password) && $request['email'] == $user->email){
	                return response()->json(['api' => $user->api_token, 'error' => '', 'message' => 'Correct credentials'], 202);
	            }
	        }
	    }
	    return response()->json(['error' => 'Invalid email or password!', 'message' => '', 'api' => ''], 404);
	}

    public function invalidApi(){
        return response()->json(['error' => 'Invalid api!', 'message' => '', 'api' => ''], 401);
    }
}
