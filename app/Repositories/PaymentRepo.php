<?php

namespace App\Repositories;

// use App\Services\;



use App\Http\Resources\PaymentResource;
use App\Interface\PaymentInterface;
use App\Models\Installment;
use App\Models\Payments;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PaymentRepo implements PaymentInterface
{

    use ApiResponse;

    public function getAllDatas()
    {

        $data = Payments::all();
        // $installment = $data->installments;

        if ($data->isEmpty()) {

            return response()->json([
                'message' => "Sorry No Data"
            ]);
        }

        // return $this->successResponse($data, '', 200);

        return PaymentResource::collection($data);
    }



    public function getData($Id)
    {

        $data = Payments::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        return new PaymentResource($data);
    }



    public function createDatas($request)
    {

        // $validated = $request->validated();

        // $data = new Payments();
        // $data->duesName = $request->duesName;
        // $data->trackPayment = $request->trackPayment;
        // $data->status = $request->status;
        // $data->amountType = $request->amountType;
        // $data->amount = $request->amount;
        // $data->paymentPlan = $request->paymentPlan;
        // $data->start = Carbon::parse($request->start);
        // $data->end = Carbon::parse($request->end);
        // $data->houseHold_id= $request->houseHold_id;
        // $data->user_id = $request->user_id;

        // // $data->save();
        // dd($data);

        $data= Payments::create([
            'duesName' => $request['duesName'],
            'trackPayment' => $request['trackPayment'],
            'status' => $request['status'],
            'amountType' => $request['amountType'],
            'amount' => $request['amount'],
            'paymentPlan' => $request['paymentPlan'],
            'start' => Carbon::parse($request['start']),
            'end' => Carbon::parse($request['end']),
            'houseHold_id' => $request['houseHold_id'],
            'user_id' => $request['user_id'],

        ]);


       
       

        // if ($data->save()) {
        //     return $this->successResponse($data, 'Data Created successfully.', 200);
        // }
        // else {
        //     return $this->errorResponse(null, 'System error', 500);
        // }


        // $install=Installment::create([
        //     'payment_id' => $data->id,
        //     'installmentType'=>$request['installmentType'],
        //     'installmentAmount'=>$request['innstallmentAmount'],
        //     'start' => Carbon::parse($request['start']),
        //     'end' => Carbon::parse($request['end']),
        //     ]);


            $installment = new Installment();
            $installment->payment_id = $data->id;
            $installment->installmentType = $request->installmentType;
            $installment->installmentAmount = $request->installmentAmount;
            $installment->start = Carbon::parse($request->start);
            $installment->end = Carbon::parse($request->end);

        // dd($installment);

        if ($data->amountType == 'flexible' || $data->paymentPlan == 'full') {

            $installment->null;            

            
        }
        else {

            $installment->save();            

        }


    }




    

    public function getDate($Id)
    
    {

        $data = Payments::find($Id);

    
    
        $startTime = Carbon::parse($data->start);
    
        $endTime = Carbon::parse($data->end);
    
    
        $duration = $endTime->diffForHumans($startTime);
    
        dd($duration);
        // dd($data);

    
    }






    public function updateData($request, $Id)
    {


        $data = Payments::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }

        $data->property_id = $request->property_id;
        $data->user_id = $request->user_id;
        $data->numberOfAlpha = $request->numberOfAlpha;
        $data->numberOfResidentUser = $request->numberOfResidentUser;
        $data->RClass = $request->RClass;
        $data->RCat = $request->RCat;


        if ($data->save()) {
            return $this->successResponse($data, 'Data updated successfully.', 200);
        }
        else {
            return $this->errorResponse($data, 'System error', 500);
        }
    }



    public function deleteData($Id)
    {


        $data = Payments::find($Id);

        if (!$data) {
            return response()->json([
                'message' => 'Data does not EXIST',
            ], 404);
        }


        if ($data->delete()) {
            return $this->successResponse($data, 'Data deleted successfully.', 200);
        }
        else {
            return $this->errorResponse($data, 'System error', 500);
        }

    }
}
