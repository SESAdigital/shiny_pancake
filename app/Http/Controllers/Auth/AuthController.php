<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthloginRequest;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

// use Nette\Utils\Json;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }



    public function login(AuthloginRequest $request)
    {
        $validated = $request->validated();

        $role = Roles::all();





        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        else {

        $user = Auth::guard('api')->user();
        $userMan = $user->managers;


            return response()->json([
                'message' => 'you are logged in',
                'token' => $token,
                'user' => $user,
                'user' => $user,
                'expires_in' => auth()->guard('admin')->factory()->getTTL() * 60
            ]);
        }

    }




    public function register(AuthRequest $request)
    {
        // dd($request);

        // $this->authorize('manage-users');

        $validated = $request->validated();



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);

        $user->save();

        return response()->json([
            'message'=>'User created',
            'user' => $user
        ], 201);

    }


    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();

        return response()->json(['message' => 'you are logged out'], 200);

    }



    public function userInfo(Request $request){
        $user = auth()->user();

        if(!$user){
            return response()->json([
                'message' => "you are not allowed",
            ]);
        }

        return response()->json([
            'user' =>  $user->with('role')->get(),
        ], 200);

    }



    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }



}
