<?php


namespace App\Traits;


trait ApiResponse
{

    protected function successResponse($data, $message = null, $code){

        return response()->json([

            'success'   => true,

            'message'   => $message,

            'data'      => $data

        ], $code);

    }

    protected function errorResponse($data, $message = null, $code){

        return response()->json([

            'success'   => false,

            'message'   => $message,

            'data'      => null

        ], $code);

    }

}
