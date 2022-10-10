<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\SecurityCompanyResource;
use App\Interface\securityCompInterface;
use App\Models\SecurityCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class securityCompRepo implements securityCompInterface
{


    public function getAllDatas()
    {

       $data = SecurityCompany::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }
        

        return SecurityCompanyResource::collection($data);


    }



    public function getData($Id)
    {

        $data = SecurityCompany::find($Id);


        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new SecurityCompanyResource($data);
        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
          $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        // $image->storeAs('/image/', $filename);
        $image->move(public_path('/security_company/'), $filename);
        // $image->move(public_path('/manager/'), $filename);



        $data = new SecurityCompany();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->status = $request->status;
        $data->password = Hash::make($request->password);


        $data->image = $filename;

        $data->save();

        return new SecurityCompanyResource($data);
    }
          
    




    public function updateData($request, $Id)
    {

        $data = SecurityCompany::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }



        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->status = $request->status;
        // dd($data);

        $data->save();

        return new SecurityCompanyResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

        $data = SecurityCompany::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->delete();

        return response()->json(['message'=>'Data is removed']);

    }

  


    // public function deleteOrder($orderId) 
    // {
    //     Order::destroy($orderId);
    // }

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