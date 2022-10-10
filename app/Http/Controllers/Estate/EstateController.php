<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstateRequest;
use App\Http\Resources\EstateResource;
use App\Interface\EstateInterface;
use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{


    protected $estate;


    public function __construct(EstateInterface $estate)
    {
        $this->estate = $estate;
        
    }


    public function estates()
    {

        // $data = Estate::with('manager')->get();
        $data = $this->estate->getAllDatas();

        return $data;

    }





    public function estate($id)
    {

        $data = $this->estate->getData($id);

        return $data;

    }


    public function createEstates(Request $request)
    {

        $data = $this->estate->createDatas($request);


        return $data;

    }





    public function upDateEstate(Request $request, $id)
    {


        $data = $this->estate->updateData($request, $id);

        return $data;


    }






    public function removeEstate($id)
    {

        $data = $this->estate->deleteData($id);


        return $data;

    }


    public function search(Request $request)
    {
        $data = $this->estate->search($request);


        return $data;

    }




    public function attachSecurityComp(Request $request, $id)
    {

        $data = $this->estate->attachSecurityComp($request,$id);


        return $data;

    }


    public function attachSecurityGuard(Request $request, $id)
    {

        $data = $this->estate->attachSecurityGuard($request, $id);


        return $data;

    }



}
