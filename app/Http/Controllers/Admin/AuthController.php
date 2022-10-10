<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthloginRequest;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

// use Nette\Utils\Json;

class AuthController extends Controller
{

    public function __construct() {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }



    public function adminlogin(AuthloginRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);


        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('admin')->attempt($credentials)) {
            return response()->json(['error' => 'invalid Credentials'], 401);
        }

        return $this->respondWithToken($token);

    }



    protected function respondWithToken($token)
    {
        $admin = Auth::guard('admin')->user();

        return response()->json([
            'message' => 'you are logged in',
            'token' => $token,
            'token_type' => 'bearer',
            'admin' => $admin,
            'expires_in' => auth()->guard('admin')->factory()->getTTL() * 60
        ]);
    }



    public function userInfo(Request $request){
        $user = auth()->user();

        if(!$user){
            return response()->json([
                'message' => "you are not allowed",
            ]);
        }

        return response()->json(['user' => $user], 200);

    }



    // protected function createNewToken($token){
    //     return response()->json([
    //         'accessToken' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth('api')->factory()->getTTL() * 60,
    //         'user' => auth()->user()
    //     ]);
    // }



}
