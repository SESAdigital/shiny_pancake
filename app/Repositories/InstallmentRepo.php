<?php

namespace App\Repositories;

// use App\Services\;



use App\Http\Resources\InstallmentResource;
use App\Interface\InstallmentInterface;
use App\Models\Installment;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstallmentRepo implements InstallmentInterface
{

    use ApiResponse;

    public function getAllDatas()
    {

        $data = Installment::all();

        if ($data->isEmpty()) {

            return response()->json([
                'message' => "Sorry No Data, Create data if you are an Admin or Manager"
            ]);
        }

        return InstallmentResource::collection($data);
    }



    public function getData($Id)
    {

        $data = Installment::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new InstallmentResource($data);
    }



    public function createDatas($request)
    {

        // $validated = $request->validated();

        $data = new Installment();
        $data->property_id = $request->property_id;
        $data->user_id = $request->user_id;
        $data->numberOfAlpha = 2;
        $data->numberOfResidentUser = 6;
        $data->RClass = $request->RClass;
        $data->RCat = $request->RCat;

        // dd($data);

        if ($data->save()) {
            return $this->successResponse($data, 'Data Created successfully.', 200);
        }
        else {
            return $this->errorResponse($data, 'System error', 500);
        }


    }






    public function updateData($request, $Id)
    {


        $data = Installment::find($Id);

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
        $data->RCat = $request->RCat;


        if ($data->save()) {
            return $this->successResponse($data, 'Data updated successfully.', 200);
        }
        else {
            return $this->errorResponse($data, 'System error', 500);
        }
    }



    public function deleteData($Id)
    {


        $data = Installment::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        if ($data->delete()) {
            return $this->successResponse($data, 'Data deleted successfully.', 200);
        }
        else {
            return $this->errorResponse($data, 'System error', 500);
        }

    }
}
