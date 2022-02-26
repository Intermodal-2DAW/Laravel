<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $user = User::where('login', $request->login)->first();

        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        else
        {
            $user->api_token = Str::random(60);
            $user->save();
            return response()->json(['id' => $user->id,'token' => $user->api_token,'rol' => $user->rol]);
        }
    }
}
