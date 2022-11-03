<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Utils\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        if(Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
            $payload['token'] =  Auth::user()->createToken('apitoker')-> accessToken;
            return Response::success($payload, "Login successfull");
        }
        else {
            return Response::success("Unauthorized", "Login failed");
        }
    }
}
