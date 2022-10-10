<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\ArtisanResource;
use App\Interface\ArtisanInterface;
use App\Models\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Catch_;

class ArtisanRepo implements ArtisanInterface
{


    public function getAllDatas()
    {

        $data = Artisan::all();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        // return ArtisanResource::collection($data);
        return ArtisanResource::collection($data);


    }



    public function getData($Id)
    {


        $data = Artisan::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new ArtisanResource($data);

        // $data = Category::find($Id);
        // $artisan = $data->artisans;


        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Data does not EXIST',
        //     ], 404);
        // }

        // return response()->json([
        //     'catagories' => $data,
        //     // 'artisan'=>$artisan,
            
        // ], 200);
        
    }



    public function createDatas($request)
    {



          //logic for creating artisan code
       
          $image   = $request->file('image');
          // dd($image);
  
          $filename   = $image->getClientOriginalName();
          // $image->storeAs('/image/', $filename);
          $image->move(public_path('/artisan/'), $filename);
  
         
  
          $data = new Artisan();
          $data->f_name = $request->f_name;
          $data->l_name = $request->l_name;
          $data->email = $request->email;
          $data->address = $request->address;
          $data->phone = $request->phone;
          $data->status = $request->status;
          $data->gender = $request->gender;
          $data->business_name = $request->business_name;
          $data->category_id = $request->category_id;
          $data->image = $filename;
          $data->id_type = $request->id_type;
          $data->id_number = $request->id_number;
  
  // dd($data);
  
          $data->save();
  
  
          return response()->json([
              'success' => 'Data Created'
          ], 201);


    }
          
    




    public function updateData($request, $Id)
    {

        $data = Artisan::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->f_name = $request->f_name;
        $data->l_name = $request->l_name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->business_name = $request->business_name;
        $data->property_id = $request->property_id;
        $data->user_id = $request->user_id;
        // $data->image = $filename;
        $data->id_type = $request->id_type;
        $data->id_number = $request->id_number;

        $data->save();

        return response()->json([
            'success' => 'Data Updated'
        ], 200);
        
    }


    
    public function deleteData($Id)
    {
        

        $data = Artisan::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        $data->delete();

        return new ArtisanResource($data);
    }

}