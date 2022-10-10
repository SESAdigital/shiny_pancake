<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\UserResource;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserRepo implements UserInterface
{
    public function getAllDatas()
    {
        // return User::all();
        $data = User::with('estate')->get();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }


        return UserResource::collection($data);
        // return $data;

    }


    public function getData($Id)
    {

        $data = User::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        // if(!$data){
        //     return $this->sendError('No Data', $data->errors());
        // }


        return new UserResource($data);
        
    }


    public function createDatas($request)
    {



          //logic for creating user code
          $characters = '0022113344557766';
          $charactersNumber = strlen($characters);
          $codeLength = 6;
      
          $code = '';
      
          while (strlen($code) < $codeLength) {
              $position = rand(0, $charactersNumber - 1);
              $character = $characters[$position];
              $code = $code.$character;
          }
  
  
          $image   = $request->file('image');
          // dd($image);
  
          $filename   = $image->getClientOriginalName();
          // $image->storeAs('/image/', $filename);
          $image->move(public_path('/test/'), $filename);
  
  
  
          $data = new User();
          $data->f_name = $request->f_name;
          $data->email = $request->email;
          $data->user_type = $request->user_type;
          $data->userCode = $code;
          $data->phone = $request->phone;
          $data->image = $filename;
          $data->gender = $request->gender;
          $data->status = $request->status;
          $data->id_type = $request->id_type;
          $data->id_number = $request->id_number;
          $data->estate_id = $request->estate_id;
          $data->password = Hash::make($request->password);
          // var_dump($user);
        //   dd($data);
  
        
  
          $data->save();
  
          return new UserResource($data);
  

        
    }


    public function updateData($request, $Id)
    {

        $data = User::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        // if(!$data){
        //     return $this->sendError('No Data', $data->errors());
        // }

        // $image   = $request->file('image');
        // // dd($image);

        // $filename   = $image->getClientOriginalName();
        // // $image->storeAs('/image/', $filename);
        // $image->move(public_path('/test/'), $filename);

        $data->f_name = $request->f_name;
        $data->email = $request->email;
        $data->user_type = $request->user_type;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->status = $request->status;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        $data->estate_id = $request->estate_id;


        // dd($data);

        // if(!$data){
        //     return $this->sendError('No Data', $data->errors());
        // }

        $data->save();

        return new UserResource($data);

        
    }
    

    public function deleteData($Id)
    {
        

        $data = User::find($Id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Resident does not EXIST',
        //     ], 404);
        // }

        // if(!$data){
        //     return $this->sendError('No Data', $data->errors());
        // }

        $data->delete();

        return new UserResource($data);

    }



    public function getOtp($req)
    {
        $otp = rand(34769, 9999);
        // Log::info("otp = ".$otp);
        // dd($otp);

        $user = DB::table('users')->where('email', $req->input('email'))->update(['otp' => $otp]);

        // $user = User::where('phone', $request->phone)->first();
        // dd($otp);
        // User::where('username','John') -> first();
        // send otp to mobile no using sms api
        return response()->json([$otp], 200);
    }

   

    public function login($request) 
    {
        $otp = $request->otp;
        $user = User::where('otp', $otp)->first();


        if (!$token = JWTAuth::fromUser($user)) {

            return response()->json(['error' => 'invalid credentials'], 401);
        }

        return $this->respondWithToken($token);
    }


    protected function respondWithToken($token)
    {
        // $data = JWTAuth::user();
        // $data = Auth::user();

        return response()->json([
            'message' => 'you are logged in',
            'token' => $token,
            'token_type' => 'bearer',
            // 'user' => $data,
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }


    public function info() 
    {
        $data = Auth::user();

        if (!$data) {
            return response()->json([
                'message' => "you are not allowed",
            ]);
        }

        return new UserResource($data);
    }



    public function logout($request)
    {
        auth()->logout();

        return response()->json([
            'status' => 'You Have Successfully Logged Out',
            'message' => 'logout'
        ], 200);
    }
    


    
    
}