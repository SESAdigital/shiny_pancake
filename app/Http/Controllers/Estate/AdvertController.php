<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertResource;
use App\Interface\AdvertInterface;
use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{

    protected $advert;
    

    public function __construct(AdvertInterface $advert)
    {
        $this->advert = $advert;
        
    }


    public function adverts()
    {

        $data = $this->advert->getAllDatas();

        return $data;

    }




    public function advert($id)
    {
        // $data = Advert::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'This Data does not EXIST',
        //     ], 404);
        // }

        // return new AdvertResource($data);

        $data = $this->advert->getData($id);
        
        return $data;
    }




    public function makeAdvert(Request $request)
    {

        // $validated = $request->validated();


        //logic for creating property code

        $data = $this->advert->createDatas($request);


        return $data;
        
        // $image   = $request->file('image');
        // // dd($image);

        // $filename   = $image->getClientOriginalName();
        // // $image->storeAs('/image/', $filename);
        // $image->move(public_path('/adverts/'), $filename);

       

        // $data = new Advert();
        // $data->name = $request->name;
        // $data->estate_id = $request->estate_id;     
        // $data->start_date = $request->start_date;
        // $data->end_date = $request->end_date;
        // $data->url = $request->url;
        // $data->status = $request->status;
        // $data->image = $filename;

        // // dd($data);

        // if ($data->save()) {

        //     return response()->json([
        //         'success' => 'Data Created'
        //     ], 201);

        // }else {
        //     return response()->json([
        //         'error' => 'data error'
        //     ], 500);
        // }
        
    }





    public function upDateAdvert(Request $request, $id)
    {

        // $data = Advert::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Data does not EXIST',
        //     ], 404);
        // }

        // //  $image   = $request->file('image');
        // // // dd($image);

        // // $filename   = $image->getClientOriginalName();
        // // // $image->storeAs('/image/', $filename);
        // // $image->move(public_path('/adverts/'), $filename);

       
        // $data->name = $request->name;
        // $data->estate_id = $request->estate_id;     
        // $data->start_date = $request->start_date;
        // $data->end_date = $request->end_date;
        // $data->url = $request->url;
        // $data->status = $request->status;
        // // $data->image = $filename;

        // // dd($data);

        // if ($data->save()) {

        //     return response()->json([
        //         'success' => 'Data Created'
        //     ], 201);

        // }else {
        //     return response()->json([
        //         'error' => 'data error'
        //     ], 500);
        // }

        $data = $this->advert->updateData($request, $id);

        return $data;
    }






    public function removeAdvert($id)
    {

        $data = $this->card->deleteData($id);


        return $data;

        // $data = Advert::find($id);

        // if (!$data) {
        //     return response()->json([
        //         'message' => 'Data does not EXIST',
        //     ], 404);
        // }


        // $data->delete();

        // return new AdvertResource($data);


        // // return response()->json([
        // //     'message' => 'Manager Removed',
        // // ]);

    }




}
