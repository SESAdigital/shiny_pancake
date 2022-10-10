<?php

namespace App\Repositories;

// use App\Services\;



use App\Http\Resources\HouseHoldResource;
use App\Interface\HouseHoldInterface;
use App\Models\HouseHold;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HouseHoldRepo implements HouseHoldInterface
{


    public function getAllDatas()
    {

        $data = HouseHold::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        return HouseHoldResource::collection($data);

        


    }



    public function getData($Id)
    {

        $data = HouseHold::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new HouseHoldResource($data);
        
    }



    public function createDatas($request)
    {

             // $validated = $request->validated();

             $data = new HouseHold();
             $data->property_id = $request->property_id;
             $data->user_id = $request->user_id;
             $data->numberOfAlpha = 2;
             $data->numberOfResidentUser = 6;
             $data->RClass = $request->RClass;
             $data->RCat= $request->RCat;
     
     // dd($data);
     
             $data->save();
     
     
             return new HouseHoldResource($data);
        
          
    }
          
    




    public function updateData($request, $Id)
    {


        $data = HouseHold::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->property_id = $request->property_id;
        $data->user_id = $request->user_id;
        $data->numberOfAlpha = $request->numberOfAlpha;
        $data->numberOfResidentUser = $request->numberOfResidentUser;
        $data->RClass = $request->RClass;
        $data->RCat= $request->RCat;


        $data->save();

        return new HouseHoldResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

        $data = HouseHold::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        $data->delete();

        return new HouseHoldResource($data);


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