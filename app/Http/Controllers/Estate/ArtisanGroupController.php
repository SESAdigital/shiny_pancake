<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtisanGroupResource;
use App\Interface\ArtisanGroupInterface;
use App\Models\ArtisanGroup;
use Illuminate\Http\Request;

class ArtisanGroupController extends Controller
{
    
    protected $artisanGroup;


    public function __construct(ArtisanGroupInterface $artisanGroup)
    {
        $this->artisanGroup = $artisanGroup;
        
    }




    public function artisanGroups()
    {

        // $data = Estate::with('manager')->get();
        $data = $this->artisanGroup->getAllDatas();

        return $data;

    }


    public function artisanGroup($id)
    {

        $data = $this->artisanGroup->getData($id);

        return $data;


    }


    public function makeArtisanGroup(Request $request)
    {

        // $validated = $request->validated();


        $data = $this->artisanGroup->createDatas($request);


        return $data;

    }





    public function upDateArtisanGroup(Request $request, $id)
    {

        $data = $this->artisanGroup->updateData($request, $id);

        return $data;

    }






    public function removeEstate($id)
    {

        $data = $this->artisanGroup->deleteData($id);


        return $data;
    }



}
