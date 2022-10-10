<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteworkerResource;
use App\Interface\SiteworkerInterface;
use Illuminate\Http\Request;

class SiteWorkerController extends Controller
{


    protected $siteworker;

    public function __construct(SiteworkerInterface $siteworker)
    {
        $this->siteworker = $siteworker;
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function siteWorkers()
    {
        $data = $this->siteworker->getAllDatas();


        return $data;
    }

  


 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function siteWorker($id)
    {
        $data = $this->siteworker->getData($id);

        return $data;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeSiteWorkers(Request $request)
    {
        $data = $this->siteworker->createDatas($request);


        return $data;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSiteWorker(Request $request, $id)
    {
        $data = $this->siteworker->updateData($request, $id);

        return $data;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeSiteWorker($id)
    {
        $data = $this->siteworker->deleteData($id);


        return $data;
    }


}
