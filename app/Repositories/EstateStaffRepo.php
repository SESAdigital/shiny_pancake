<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\EstateStaffResource;
use App\Interface\EstateStaffInterface;
use App\Models\EstateStaff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EstateStaffRepo implements EstateStaffInterface
{


    public function getAllDatas()
    {

        $data = EstateStaff::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }


        return EstateStaffResource::collection($data);

        


    }



    public function getData($Id)
    {

        $data = EstateStaff::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        return new EstateStaffResource($data);
        
    }



    public function createDatas($request)
    {

              // $validated = $request->validated();

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
      
              $data = new EstateStaff();
              $data->f_name = $request->f_name;
              $data->l_name = $request->l_name;
              $data->phone = $request->phone;
              $data->dob = $request->dob;
              $data->address = $request->address;
              $data->gender = $request->gender;
              $data->staff_code = $code;
              $data->work_days = $request->work_days;
              $data->message = $request->message;
              $data->id_type = $request->id_type;
              $data->id_number = $request->id_number;
              $data->estate_id = $request->estate_id;
      
              
              
      
              $data->save();
      
              return new EstateStaffResource($data);
          
    }
          
    




    public function updateData($request, $Id)
    {


        $data = EstateStaff::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }

        $data->f_name = $request->f_name;
        $data->l_name = $request->l_name;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->work_days = $request->work_days;
        $data->message = $request->message;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        $data->estate_id = $request->estate_id;

        $data->save();

        return new EstateStaffResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

            $data = EstateStaff::find($Id);

            if (!$data) {
                return response()->json([
                    'message' => 'Estate does not EXIST',
                ], 404);
            }


            $data->delete();

            return new EstateStaffResource($data);


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