<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyANDLoginController extends Controller
{

    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
        
    }

    public function sendOtp(Request $request)
    {

        $data = $this->user->getOtp($request);


        return $data;

    }



    public function loginUser(Request $request)
    {
        // $validated = $request->validated();
        // dd($request);

        $data = $this->user->login($request);


        return $data;

    }







    public function personalInfo(Request $request)
    {

        $data = $this->user->info();


        return $data;
    }





    public function userLogout(Request $request)
    {

        $data = $this->user->info();


        return $data;

    //     auth()->logout();

    //     return response()->json([
    //         'status' => 'You Have Successfully Logged Out',
    //         'message' => 'logout'
    //     ], 200);
    }

}
