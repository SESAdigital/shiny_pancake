<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccessCard\AccessCardRequest;
use App\Http\Resources\AccessResource;
use App\Interface\AccesCardInterface;
use App\Models\AccessCard;
use App\Models\RFID;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    protected $card;

    public function __construct(AccesCardInterface $card)
    {
        $this->card = $card;
        
    }


    public function accessCards()
    {

         $data = $this->card->getAllDatas();

        return $data;

    }




    public function accessCard($id)
    {
    
        $data = $this->card->getData($id);

        return $data;

      
    }




    public function makeAccessCard(AccessCardRequest $request)
    {

        $validated = $request->validated();


     

        /**
         * logic for creating property code 
         * 
         * 
         */

        $data = $this->card->createDatas($request);


        return $data;
 
    }





    public function upDateAccesCard(Request $request, $id)
    {

        $data = $this->card->updateData($request, $id);

        return $data;

       
    }






    public function deleteAccessCard($id)
    {

        $data = $this->card->deleteData($id);


        return $data;

     
    }






}
