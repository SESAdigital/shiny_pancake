<?php

namespace App\Repositories;

// use App\Services\;


use App\Http\Resources\EstateResource;
use App\Interface\EstateInterface;
use App\Models\Estate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EstateRepo implements EstateInterface
{


    public function getAllDatas()
    {

        $data = Estate::all();

        if ($data->isEmpty()) {

            return response()->json([
                'message' => "Sorry No Data, Create data if you are an Admin or Manager"
            ]);
        }


        return EstateResource::collection($data);
    }



    public function getData($Id)
    {

        $data = Estate::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }


        return new EstateResource($data);
    }



    public function createDatas($request)
    {

        // $validated = $request->validated();

        $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        // $image->storeAs('/image/', $filename);
        $image->move(public_path('/estate/'), $filename);

        $data = new Estate();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->security_id = $request->security_id;
        $data->manager_id = $request->manager_id;
        $data->estate_fee = $request->estate_fee;
        $data->sesa_fee = $request->sesa_fee;
        $data->no_of_resident_users = $request->no_of_resident_users;
        $data->additional_user = $request->additional_user;
        $data->image = $filename;
        $data->account_number = $request->account_number;
        $data->account_name = $request->account_name;
        $data->bank_name = $request->bank_name;




        $data->save();

        return new EstateResource($data);
    }






    public function updateData($request, $Id)
    {


        $data = Estate::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }

        $data->name = $request->name;
        $data->address = $request->address;
        $data->state = $request->state;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->security_id = $request->security_id;
        $data->manager_id = $request->manager_id;
        $data->estate_fee = $request->estate_fee;
        $data->sesa_fee = $request->sesa_fee;
        $data->no_of_resident_users = $request->no_of_resident_users;
        $data->additional_user = $request->additional_user;
        $data->account_number = $request->account_number;
        $data->account_name = $request->account_name;
        $data->bank_name = $request->bank_name;
        // dd($data);

        $data->save();

        // return response()->json([
        //     'message' => 'Estate Updated',
        //     'estate' => $data
        // ], 201);
        return new EstateResource($data);
    }



    public function deleteData($Id)
    {


        $data = Estate::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }


        $data->delete();

        return new EstateResource($data);
    }


    public function search($request)
    {

        // this collects the input from the request

        $q = $request->input('search');

        // this performs the logic of query the database for the specific propertise
        $property = Estate::query()->where('name', 'LIKE', "%{$q}")->orWhere('state', 'LIKE', "%{$q}")->
        orWhere('address', 'LIKE', "%{$q}")->get();


        if (count($property) > 0) {

            return EstateResource::collection($property);
        } else {
            return response()->json([
                'error' => 'No details found. Try another search'
            ]);
        }

    }



    public function attachSecurityComp($request, $Id)
    {
        $data = Estate::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }

        $data->security_id = $request->security_id;

        $data->save();


        return response()->json([
            'success'=>'SecurityCompnay Added'
        ]);


    }


    public function attachSecurityGuard($request, $Id)
    {

        $data = Estate::find($Id);

        
        if (!$data) {
            return response()->json([
                'message' => 'Estate does not EXIST',
            ], 404);
        }

        $data->security_id = $request->security_id;

        $data->save();

        return response()->json([
            'success'=>'SecurityGuard Added'
        ]);

    }


}
