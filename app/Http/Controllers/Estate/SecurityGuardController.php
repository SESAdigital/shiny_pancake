<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Interface\SecurityGuardInterface;
use Illuminate\Http\Request;

class SecurityGuardController extends Controller
{

    protected $securityGuard;

    public function __construct(SecurityGuardInterface $securityGuard)
    {
        $this->securityGuard = $securityGuard;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function securityGuards()
    {
        $data = $this->securityGuard->getAllDatas();


        return $data;
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function securityGuard($id)
    {
        $data = $this->securityGuard->getData($id);

        return $data;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeSecurityGuard(Request $request)
    {
        $data = $this->securityGuard->createDatas($request);


        return $data;
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upDateSecurityGuard(Request $request, $id)
    {
        $data = $this->securityComp->updateData($request, $id);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeSecurityGuard($id)
    {

        $data = $this->securityComp->deleteData($id);


        return $data;
    }
}
