<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\SecurityCompanyResource;
use App\Http\Resources\SecurityGuardResource;
use App\Http\Resources\SiteworkerResource;
use App\Interface\SecurityGuardInterface;
use App\Models\SecurityCompany;
use App\Models\SecurityGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityGuardRepo implements SecurityGuardInterface
{


    public function getAllDatas()
    {

        $data = SecurityGuard::all();

        if ($data->isEmpty()) {

            return response()->json([
                'message' => "Sorry No Data, Create data if you are an Admin or Manager"
            ]);
        }


        return SecurityGuardResource::collection($data);
    }



    public function getData($Id)
    {

        $data = SecurityGuard::find($Id);


        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new SecurityGuardResource($data);
    }



    public function createDatas($request)
    {


        $characters = '0022113344557766';
        $charactersNumber = strlen($characters);
        $codeLength = 6;
    
        $code = '';
    
        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        //logic for creating user code

        $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        // $image->storeAs('/image/', $filename);
        $image->move(public_path('/securityGuard/'), $filename);
        // $image->move(public_path('/manager/'), $filename);



        $data = new SecurityGuard();
        $data->f_name = $request->f_name;
        $data->m_name = $request->m_name;
        $data->l_name = $request->l_name;
        $data->dob = $request->dob;
        $data->guard_code = $code;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        $data->image = $filename;

        $data->save();

        return new SecurityGuardResource($data);
    }






    public function updateData($request, $Id)
    {

        $data = SecurityGuard::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }



        $data->f_name = $request->f_name;
        $data->m_name = $request->m_name;
        $data->l_name = $request->l_name;
        $data->dob = $request->dob;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        // dd($data);

        $data->save();

        return new SecurityGuardResource($data);
    }



    public function deleteData($Id)
    {


        $data = SecurityGuard::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data is removed']);
    }
}
