<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtisanCategoryResource;
use App\Http\Resources\ArtisanResource;
use App\Interface\ArtisanCatInterface;
use App\Models\ArtisanCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtisanCategoryController extends Controller
{
    

    protected $artisanCat;

    public function __construct(ArtisanCatInterface $artisanCat)
    {
        $this->artisanCat = $artisanCat;
        
    }


    public function artisanCats()
    {


        $data = $this->artisanCat->getAllDatas();

        return $data;


    }


    public function artisanCat($id)
    {


        $data = $this->artisanCat->getData($id);

        return $data;
    }




    public function makeArtisanCat(Request $request)
    {

        // $validated = $request->validated();


        $data = $this->artisanCat->createDatas($request);


        return $data;

      

     

    }





    public function upDateArtisanCat(Request $request, $id)
    {


        $data = $this->artisanCat->updateData($request, $id);

        return $data;

     

    }






    public function removeArtisanCat($id)
    {

        $data = $this->artisanCat->deleteData($id);


        return $data;


   
    }



}
