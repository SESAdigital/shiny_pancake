<?php

namespace App\Repositories;

// use App\Services\;

use App\Http\Resources\ArtisanCategoryResource;
use App\Interface\ArtisanCatInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Catch_;

class ArtisanCatRepo implements ArtisanCatInterface
{


    public function getAllDatas()
    {

        $data = Category::with('artisans')->get();

        if ($data->isEmpty()) {

            return response()->json([
               'message'=>"Sorry No Data, Create data if you are an Admin or Manager"
           ]);

       }

        // $data = ArtisanCategory::find('artisan_categories')->category;
        
        // $data = Category::all();
        return response()->json([
            'category' => $data,
        ], 200);
        


    }



    public function getData($Id)
    {

        $data = Category::find($Id);
        $artisan = $data->artisans;


        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return response()->json([
            'catagories' => $data,
            // 'artisan'=>$artisan,
            
        ], 200);
        
    }



    public function createDatas($request)
    {



          //logic for creating user code
        
          $data = new Category();
          $data->name = $request->name;
          $data->status = $request->status;
  
          $data->save();
  
          return response()->json([
  
              'message' => 'Category',
              'category' => $data
  
          ], 201);
    }
          
    




    public function updateData($request, $Id)
    {

        $data = Category::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->name = $request->name;
        $data->status = $request->status;

        $data->save();

        // return response()->json([
        //     'message' => 'Estate Updated',
        //     'estate' => $data
        // ], 201);
        return new Category($data);
        
    }


    
    public function deleteData($Id)
    {
        

       $data = Category::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        $data->delete();

        


        return response()->json([
            'message' => 'Data Removed',
        ], 200);
    }


    

  


    // public function deleteOrder($orderId) 
    // {
    //     Order::destroy($orderId);
    // }

    // public function createOrder(array $orderDetails) 
    // {
    //     return Order::create($orderDetails);
    // }

    // public function updateOrder($orderId, array $newDetails) 
    // {
    //     return Order::whereId($orderId)->update($newDetails);
    // }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}