<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SecurityCompanyRequest;
use App\Http\Resources\SecurityCompanyResource;
use App\Interface\securityCompInterface;
use App\Models\SecurityCompany;
use Illuminate\Http\Request;

class SecurityController extends BaseController
{

    protected $securityComp;

    public function __construct(securityCompInterface $securityComp)
    {
        $this->securityComp = $securityComp;
    }


    public function securityComps()
    {


        $data = $this->securityComp->getAllDatas();


        return $data;
    }


    public function securityComp($id)
    {

        $data = $this->securityComp->getData($id);

        return $data;
    }



    public function makeSecurityComp(SecurityCompanyRequest $request)
    {
        $data = $this->securityComp->createDatas($request);


        return $data;
    }


    public function upDateSecurityComp(Request $request, $id)
    {

        $data = $this->securityComp->updateData($request, $id);

        return $data;
    }



    public function removeSecurityComp($id)
    {


        $data = $this->securityComp->deleteData($id);


        return $data;
    }
}
