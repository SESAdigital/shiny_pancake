<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\RFIDResource;
use App\Interface\RFIDInterface;
use App\Models\RFID;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Catch_;

class RFIDRepo implements RFIDInterface
{


    public function getAllDatas()
    {

        $data = RFID::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        return RFIDResource::collection($data);


    }



    public function getData($id)
    {


        $data = RFID::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new RFIDResource($data);
        // ], 200);
        
    }



    public function createDatas($request)
    {



        $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        // $image->storeAs('/image/', $filename);
        $image->move(public_path('/RFIDS/'), $filename);

        // dd($filename);

        $data = new RFID();
        $data->property_id = $request->property_id;
        $data->SN = $request->SN;
        $data->VRNumber = $request->VRNumber;
        $data->VMake = $request->VMake;
        $data->VType= $request->VType;
        $data->image= $filename;


// dd($data);

        $data->save();


        return new RFIDResource($data);


    }
          
    




    public function updateData($request, $id)
    {

        $data = RFID::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }

        $image   = $request->file('image');
        // dd($image);

        $filename   = $image->getClientOriginalName();
        // $image->storeAs('/image/', $filename);
        $image->move(public_path('/RFID/'), $filename);

        

        $data->property_id = $request->property_id;
        $data->SN = $request->SN;
        $data->VRNumber = $request->VRNumber;
        $data->VMake = $request->VMake;
        $data->VType= $request->VType;
        $data->image= $request->$filename;
        


        $data->save();

        return new RFIDResource($data);

        
    }


    
    public function deleteData($id)
    {
        

        $data = RFID::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Property does not EXIST',
            ], 404);
        }


        $data->delete();

        return new RFIDResource($data);


        // return response()->json([
        //     'message' => 'Manager Removed',
        // ]);

    }

}