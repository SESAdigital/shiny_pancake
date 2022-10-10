<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Interface\ManagerInterface;
use Illuminate\Http\Request;

class ManagerController extends Controller
{


    protected $manager;

    public function __construct(ManagerInterface $manager)
    {
        $this->manager = $manager;
    }


    public function managers()
    {

        $data = $this->manager->getAllDatas();


        return $data;
    }



    public function manager($id)
    {

        $data = $this->manager->getData($id);

        return $data;
    }


    public function registerManagers(ManagerRequest $request)
    {


        // $this->authorize('manage-users');

        $validated = $request->validated();

        $data = $this->manager->createDatas($request);


        return $data;
    }


    public function upDateManager(Request $request, $id)
    {

        $data = $this->manager->updateData($request, $id);

        return $data;
    }




    public function removeManager($id)
    {

        $data = $this->manager->deleteData($id);


        return $data;
    }



    public function loginManagers(Request $request)
    {

        $data = $this->manager->login();


        return $data;
    }





    public function managerLogout()
    {

        $data = $this->manager->login();


        return $data;
    }




    public function personalManagerInfo(Request $request)
    {
        $data = $this->manager->personalInfo();


        return $data;
    }


    public function search(Request $request)
    {
        $data = $this->manager->search($request);


        return $data;
    }
}
