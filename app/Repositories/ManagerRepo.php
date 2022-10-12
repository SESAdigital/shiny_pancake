<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\ManagerResource;
use App\Interface\ManagerInterface;
use App\Mail\SESAMAIL;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ManagerRepo implements ManagerInterface
{
    public function getAllDatas()
    {

        $data = Manager::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }


        return ManagerResource::collection($data);

    }



    public function getData($Id)
    {

        $data = Manager::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Manager does not EXIST',
            ], 404);
        }

        return new ManagerResource($data);
        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
          $image   = $request->file('image');
          // dd($image);
  
          $filename   = $image->getClientOriginalName();
          // $image->storeAs('/image/', $filename);
          $image->move(public_path('/manager/'), $filename);
  
          $data = new Manager();
          $data->f_name = $request->f_name;
          $data->l_name = $request->l_name;
          $data->email = $request->email;
          $data->status = $request->status;
          $data->address = $request->address;
          $data->gender = $request->gender;
          $data->dob = $request->dob;
          $data->image = $filename;
          $data->password = Hash::make($request->password);
  
          // dd($data);
        //   $data->save();

          $mailData = [

            'title' => 'HELLO '. $data->f_name,
    
            'body' => 'You have been onboarded As A manager on sesa App'
    
        ];
  
          Mail::to($data->email)->send(new SESAMAIL($mailData));

          
        //   ::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
  
          return new ManagerResource($data);
          
    }




    public function updateData($request, $Id)
    {

         $data = Manager::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Manager does not EXIST',
            ], 404);
        }

        $data->f_name = $request->f_name;
        $data->l_name = $request->l_name;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->gender = $request->gender;


        // $data->password = $request->password;

        $data->save();

        return new ManagerResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

         $data = Manager::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Manager does not EXIST',
            ], 404);
        }


        $data->delete();

        return new ManagerResource($data);

    }



    public function login() 
    {
     
        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('manager')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        return $this->respondWithToken($token);
        

    }

   
    protected function respondWithToken($token)
    {
        $data = Auth::guard('manager')->user();
        $estate = $data->estates;

        return response()->json([
            'message' => 'you are logged in',
            'token' => $token,
            'token_type' => 'bearer',
            'manager' => $data,
            'estate' => $estate,
            'expires_in' => auth()->guard('manager')->factory()->getTTL() * 60
        ]);
    }



    public function logout() 
    {
        Auth::guard('manager')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
    }


    public function personalInfo() 
    {
        $data = Auth::guard('manager')->user();

        if (!$data) {
            return response()->json([
                'message' => "you are not allowed",
            ]);
        }

        return new ManagerResource($data);
    }



    
    public function search($request)
    {
            // this collects the input from the request

            $q = $request->input('search');

            // this performs the logic of query the database for the specific propertise
            $property = Manager::query()->where('f_name', 'LIKE', "%{$q}")->
            orWhere('l_name', 'LIKE', "%{$q}")->
            orWhere('gender', 'LIKE', "%{$q}")->
            orWhere('status', 'LIKE', "%{$q}")->get();
            // orWhere('estate', 'LIKE', "%{$q}")->get();
    
    
            if (count($property) > 0) {
    
                return ManagerResource::collection($property);
            } else {
                return response()->json([
                    'error' => 'No details found. Try another search'
                ]);
            }
    }


    // public function createOrder(array $orderDetails) 
    // {
    //     return Order::create($orderDetails);
    // }

    // public function updateOrder($orderId, array $newDetails) 
    // {
    //     return Order::whereId($orderId)->update($newDetails);
    // }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}