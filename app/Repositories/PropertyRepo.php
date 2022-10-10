<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\PropertyResource;
use App\Interface\PropertyInterface;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PropertyRepo implements PropertyInterface
{


    public function getAllDatas()
    {

        $data = Property::all();

        if ($data->isEmpty()) {

            return response()->json([
                'message' => "Sorry No Data, Create data if you are an Admin or Manager"
            ]);
        }

        return PropertyResource::collection($data);
    }



    public function getData($Id)
    {

        $data = Property::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }

        return new PropertyResource($data);
    }



    public function createDatas($request)
    {

        // $validated = $request->validated();

        //logic for creating property code

        $characters = '0022113344557766';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }


        $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        $image->storeAs('/image/', $filename);
        // dd($filename);

        $data = new Property();
        $data->flat_block_number = $request->flat_block_number;
        $data->business_name = $request->business_name;
        $data->street_name = $request->street_name;
        $data->address_description = $request->address_description;
        $data->propertyCode = $code;
        $data->image = $filename;
        $data->estate_id = $request->estate_id;
        $data->property_category = $request->property_category;
        $data->property_type_id = $request->property_type_id;

        // dd($data);

        $data->save();


        return new PropertyResource($data);
    }






    public function updateData($request, $Id)
    {


        $data = Property::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }

        $data->name = $request->name;
        $data->description = $request->description;


        $data->save();

        return new PropertyResource($data);
    }



    public function deleteData($Id)
    {


        $data = Property::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }


        $data->delete();

        return new PropertyResource($data);
    }


    public function search($request)
    {

        // this collects the input from the request

        $q = $request->input('search');

        // this performs the logic of query the database for the specific propertise
        $property = Property::query()->where('propertyCode', 'LIKE', "%{$q}")->get();


        if (count($property) > 0) {

            return PropertyResource::collection($property);
        }else {
            return response()->json([
                'error'=>'No details found. Try another search'
            ]);
        }

    }
}
