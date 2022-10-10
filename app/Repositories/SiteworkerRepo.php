<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\SecurityCompanyResource;
use App\Http\Resources\SiteworkerResource;
use App\Interface\SiteworkerInterface;
use App\Models\SiteWorker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiteworkerRepo implements SiteworkerInterface
{


    public function getAllDatas()
    {

        $data = SiteWorker::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        return SiteworkerResource::collection($data);


    }



    public function getData($Id)
    {

        $data = SiteWorker::find($Id);


        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new SiteworkerResource($data);
        
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
        $image->move(public_path('/Siteworker/'), $filename);
        // $image->move(public_path('/manager/'), $filename);



        $data = new Siteworker();
        $data->f_name = $request->f_name;
        $data->m_name = $request->m_name;
        $data->l_name = $request->l_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->siteworker_code = $code;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->work_days = $request->work_days;
        $data->time_in = $request->time_in;
        $data->time_out = $request->time_out;
        $data->message = $request->message;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        $data->property_id = $request->property_id;

        $data->image = $filename;

        $data->save();

        return new SiteworkerResource($data);
    }
          
    




    public function updateData($request, $Id)
    {

        $data = SiteWorker::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }



        $data->f_name = $request->f_name;
        $data->f_name = $request->m_name;
        $data->l_name = $request->l_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->work_days = $request->work_days;
        $data->time_in = $request->time_in;
        $data->time_out = $request->time_out;
        $data->message = $request->message;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;
        $data->property_id = $request->property_id;
        // dd($data);

        $data->save();

        return new SiteworkerResource($data);

        
    }


    
    public function deleteData($Id)
    {
        

        $data = SiteWorker::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->delete();

        return response()->json(['message'=>'Data is removed']);

    }

  
}