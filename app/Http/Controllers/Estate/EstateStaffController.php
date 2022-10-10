<?php

namespace App\Http\Controllers\Estate;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Interface\EstateStaffInterface;
use App\Models\EstateStaff;
use Illuminate\Http\Request;

class EstateStaffController extends Controller
{



    protected $estateStaff;


    public function __construct(EstateStaffInterface $estateStaff)
    {
        $this->estateStaff = $estateStaff;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estateStaffs()
    {
        $data = $this->estateStaff->getAllDatas();

        return $data;
    }


 /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstateStaff  $estateStaff
     * @return \Illuminate\Http\Response
     */
    public function estateStaff(Request $request, $id)
    {
        $data = $this->estateStaff->getData($id);

        return $data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeEstateStaffs(Request $request)
    {
        $data = $this->estateStaff->createDatas($request);


        return $data;
    }





       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstateStaff  $estateStaff
     * @return \Illuminate\Http\Response
     */
    public function upDateEstateStaff(Request $request, $id)
    {
        $data = $this->estateStaff->updateData($request, $id);

        return $data;
    }

   

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstateStaff  $estateStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->estateStaff->deleteData($id);


        return $data;
    }

    
}
