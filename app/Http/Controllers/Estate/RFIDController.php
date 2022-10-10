<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\RFIDRequest;
use App\Http\Resources\RFIDResource;
use App\Interface\RFIDInterface;
use App\Models\RFID;
use Illuminate\Http\Request;

class RFIDController extends Controller
{
    

    protected $rfid;

    public function __construct(RFIDInterface $rfid)
    {
        $this->rfid = $rfid;
        
    }




    public function RFIDs()
    {
        $data = $this->rfid->getAllDatas();

        return $data;
    }




    public function RFID($id)
    {
        $data = $this->rfid->getData($id);

        return $data;
    }




    public function makeRFID(RFIDRequest $request)
    {

        $validated = $request->validated();


        //logic for creating property code
        $data = $this->rfid->createDatas($request);


        return $data;

    }





    public function upDateRFID(Request $request, $id)
    {

        $data = $this->rfid->updateData($request, $id);

        return $data;

    }






    public function deleteRFID($id)
    {


        $data = $this->rfid->deleteData($id);


        return $data;

    }





}
