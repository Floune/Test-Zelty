<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Utils\Response;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'lastname' =>$request->input("lastname"),
            'firstname' =>$request->input("firstname"),
            'email'=>$request->input("email"),
            'password'=>bcrypt($request->input("password"))
        ]);
        return Response::success(
            $user->createToken('apitoken')->accessToken,
            "Account succesfully created", 301
        );
    }
}
