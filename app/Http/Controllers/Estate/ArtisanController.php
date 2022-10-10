<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtisanRequest;
use App\Http\Resources\ArtisanResource;
use App\Interface\ArtisanInterface;
use App\Models\Artisan;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    

    protected $artisan;

    public function __construct(ArtisanInterface $artisan)
    {
        $this->artisan = $artisan;
        
    }

    public function artisans()
    {

        $data = $this->artisan->getAllDatas();

        return $data;

    }




    public function artisan($id)
    {
    
        $data = $this->artisan->getData($id);

        return $data;
    }




    public function makeArtisan(ArtisanRequest $request)
    {

        $validated = $request->validated();


        $data = $this->artisan->createDatas($request);


        return $data;

        //logic for creating property code

    }





    public function upDateArtisan(Request $request, $id)
    {

        $data = $this->artisan->updateData($request, $id);

        return $data;

        // $data = Artisan::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Data does not EXIST',
        //     ], 404);
        // }

        // $data->f_name = $request->f_name;
        // $data->l_name = $request->l_name;
        // $data->email = $request->email;
        // $data->address = $request->address;
        // $data->gender = $request->gender;
        // $data->business_name = $request->business_name;
        // $data->property_id = $request->property_id;
        // $data->user_id = $request->user_id;
        // // $data->image = $filename;
        // $data->id_type = $request->id_type;
        // $data->id_number = $request->id_number;

        // $data->save();

        // return response()->json([
        //     'success' => 'Data Updated'
        // ], 200);
    }






    public function removeArtisan($id)
    {

        $data = $this->artisan->deleteData($id);


        return $data;

        // $data = Artisan::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Data does not EXIST',
        //     ], 404);
        // }


        // $data->delete();

        // return new ArtisanResource($data);


        // return response()->json([
        //     'message' => 'Manager Removed',
        // ]);
    }



}
