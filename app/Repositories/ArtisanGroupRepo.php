<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\ArtisanGroupResource;
use App\Interface\ArtisanGroupInterface;
use App\Models\ArtisanGroup;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArtisanGroupRepo implements ArtisanGroupInterface
{


    public function getAllDatas()
    {

        $data = ArtisanGroup::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }


        // $posts = Post::with('user')->get();

        // return response()->json([
        //     'artisanGroups' => $data,
        // ]);

        return ArtisanGroupResource::collection($data);
        


    }



    public function getData($Id)
    {

        $data = ArtisanGroup::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        // return response()->json([
        //     'artisanGroups' => $data,
        // ], 200);

        return new ArtisanGroupResource($data);

        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
        $data = new ArtisanGroup();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->estate_id = $request->estate_id;
        $data->artisan_id = $request->artisan_id;

        // dd($data);

        $data->save();

        // return response()->json([

        //     'message' => 'Estate Created',
        //     '' => $data

        // ], 201);

        return new ArtisanGroupResource($data);


    }
          
    




    public function updateData($request, $Id)
    {

        $data = ArtisanGroup::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->name = $request->name;
        $data->status = $request->status;
        $data->estate_id = $request->estate_id;
        $data->artisan_id = $request->artisan_id;
        $data->save();

        // return response()->json([
        //     'message' => 'Estate Updated',
        //     'estate' => $data
        // ], 201);
        return new ArtisanGroupResource($data);
      
        
    }


    
    public function deleteData($Id)
    {
        

        $data = ArtisanGroup::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        $data->delete();

        return new ArtisanGroupResource($data);


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