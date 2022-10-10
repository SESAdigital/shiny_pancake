<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\AccessResource;
use App\Interface\AccesCardInterface;
use App\Models\AccessCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccessCardRepo implements AccesCardInterface
{
    public function getAllDatas()
    {

        $data = AccessCard::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        return AccessResource::collection($data);

    }



    public function getData($Id)
    {

        $data = AccessCard::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new AccessResource($data);
        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
          $image   = $request->file('image');
       

        $filename   = $image->getClientOriginalName();
        $image->move(public_path('/ACARD/'), $filename);
        // $image->storeAs('/image/', $filename);


        $data = new AccessCard();
        $data->property_id = $request->property_id;
        $data->SN = $request->SN;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->image = $filename;


// dd($data);

        $data->save();


        return new AccessResource($data);
          
    }




    public function updateData($request, $Id)
    {

        $data = AccessCard::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }

        // $image   = $request->file('image');
        // // dd($image);

        // $filename   = $image->getClientOriginalName();
        // $image->move(public_path('/ACARD/'), $filename);

        // $image->storeAs('/image/', $filename);

        $data->property_id = $request->property_id;
        $data->SN = $request->SN;
        $data->name = $request->name;
        $data->phone = $request->phone;
        // $data->image= $request->$filename;
        


        $data->save();

        return new AccessResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

        $data = AccessCard::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }


        $data->delete();

        return new AccessResource($data);


        // return response()->json([
        //     'message' => 'Manager Removed',
        // ]);

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