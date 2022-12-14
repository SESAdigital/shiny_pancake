<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public function sendError($error, $errorMessages = [], $code = 404){

        $response = [

            'success' => false,
            'message' => $error,

        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
;
        return response()->json($response, $code);

    }
}
