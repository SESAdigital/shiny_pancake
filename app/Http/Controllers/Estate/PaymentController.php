<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Interface\PaymentInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Payments()
    {
        $data = $this->payment->getAllDatas();


        return $data;
    }

  


 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Payment($id)
    {
        $data = $this->payment->getData($id);

        return $data;
    }



    public function date($id)
    {
        $data = $this->payment->getDate($id);

        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makePayment(Request $request)
    {
        $data = $this->payment->createDatas($request);


        return $data;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePayment(Request $request, $id)
    {
        $data = $this->payment->updateData($request, $id);

        return $data;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removePayment($id)
    {
        $data = $this->payment->deleteData($id);


        return $data;
    }
}
