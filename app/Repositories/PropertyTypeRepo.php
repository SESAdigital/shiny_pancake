<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\PropertyTypeResource;
use App\Interface\PropertyTypeInterface;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PropertyTypeRepo implements PropertyTypeInterface
{


    public function getAllDatas()
    {

        $data = PropertyType::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        return PropertyTypeResource::collection($data);


    }



    public function getData($Id)
    {

        $data = PropertyType::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'PropertyType does not EXIST',
            ], 404);
        }

        return new PropertyTypeResource($data);
        
    }



    public function createDatas($request)
    {

             // $validated = $request->validated();

        //logic for creating property code

       
        $data = new PropertyType();
        $data->name = $request->name;
        $data->description = $request->description;
        // dd($data);

        $data->save();


        return new PropertyTypeResource($data);
        
          
    }
          
    




    public function updateData($request, $Id)
    {


        $data = PropertyType::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'PropertyType does not EXIST',
            ], 404);
        }

        $data->name = $request->name;
        $data->description = $request->description;


        $data->save();

        return new PropertyTypeResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

        $data = PropertyType::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }


        $data->delete();

        return new PropertyTypeResource($data);



    }



}