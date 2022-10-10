<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\HouseholdRequest;
use App\Http\Resources\HouseHoldResource;
use App\Interface\HouseHoldInterface;
use App\Models\HouseHold;
use Illuminate\Http\Request;

class HouseHoldController extends Controller
{
    

    protected $houseHold;

    public function __construct(HouseHoldInterface $houseHold)
    {
        $this->houseHold = $houseHold;
        
    }




    public function houseHolds()
    {
        $data = $this->houseHold->getAllDatas();

        return $data;
    }




    public function houseHold($id)
    {
        $data = $this->houseHold->getData($id);

        return $data;
    }




    public function makeHouseHold(HouseholdRequest $request)
    {

        $validated = $request->validated();


        //logic for creating property code
        


       
        $data = $this->houseHold->createDatas($request);


        return $data;


    }





    public function upDateHouseHold(Request $request, $id)
    {

        $data = $this->houseHold->updateData($request, $id);

        return $data;

        
    }






    public function deleteHouseHold($id)
    {

        $data = $this->houseHold->deleteData($id);


        return $data;

    }



}
