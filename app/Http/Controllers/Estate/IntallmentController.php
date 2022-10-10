<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Interface\InstallmentInterface;
use Illuminate\Http\Request;

class IntallmentController extends Controller
{
    
    protected $installment;

    public function __construct(InstallmentInterface $sinstallment)
    {
        $this->sinstallment = $sinstallment;
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Installments()
    {
        $data = $this->installment->getAllDatas();


        return $data;
    }

  


 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Installment($id)
    {
        $data = $this->installment->getData($id);

        return $data;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeInstallment(Request $request)
    {
        $data = $this->installment->createDatas($request);


        return $data;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInstallment(Request $request, $id)
    {
        $data = $this->installment->updateData($request, $id);

        return $data;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeInstallment($id)
    {
        $data = $this->installment->deleteData($id);


        return $data;
    }

}
