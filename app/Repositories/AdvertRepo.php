<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\AdvertResource;
use App\Interface\AdvertInterface;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdvertRepo implements AdvertInterface
{


    public function getAllDatas()
    {

        $data = Advert::all();

        //this logic here checks if the data returned is empty and it sends a proper message
        if ($data->isEmpty()) {

             return response()->json([
                'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
            ]);

        }

       
        return AdvertResource::collection($data);
        


    }



    public function getData($Id)
    {

        $data = Advert::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'This Data does not EXIST',
            ], 404);
        }

        return new AdvertResource($data);
        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
          $image   = $request->file('image');
          // dd($image);
  
          $filename   = $image->getClientOriginalName();
          // $image->storeAs('/image/', $filename);
          $image->move(public_path('/adverts/'), $filename);
  
         
  
          $data = new Advert();
          $data->name = $request->name;
          $data->estate_id = $request->estate_id;     
          $data->start_date = $request->start_date;
          $data->end_date = $request->end_date;
          $data->url = $request->url;
          $data->status = $request->status;
          $data->image = $filename;
  
          // dd($data);
  
          if ($data->save()) {
  
              return response()->json([
                  'success' => 'Data Created'
              ], 201);
  
          }else {
              return response()->json([
                  'error' => 'data error'
              ], 500);
          }
        
          
    }
          
    




    public function updateData($request, $Id)
    {

        $data = Advert::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        //  $image   = $request->file('image');
        // // dd($image);

        // $filename   = $image->getClientOriginalName();
        // // $image->storeAs('/image/', $filename);
        // $image->move(public_path('/adverts/'), $filename);

       
        $data->name = $request->name;
        $data->estate_id = $request->estate_id;     
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->url = $request->url;
        $data->status = $request->status;
        // $data->image = $filename;

        // dd($data);

        if ($data->save()) {

            return response()->json([
                'success' => 'Data Created'
            ], 201);

        }else {
            return response()->json([
                'error' => 'data error'
            ], 500);
        }

        
    }


    
    public function deleteData($Id)
    {
        

        $data = Advert::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        $data->delete();

        return new AdvertResource($data);

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