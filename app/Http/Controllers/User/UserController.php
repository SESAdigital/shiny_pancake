<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller; 
use App\Interface\UserInterface;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends BaseController
{

    // private  $UserService  $UserRepo;

    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
        
    }
  

    // public function __construct() {
    //     // $this->middleware('auth:api', ['except' => ['loginUser', 'registerUser']]);
    // }



    public function users()
    {

        $data = $this->user->getAllDatas();


        return $data;
    }




    public function user($id)
    {
        $data = $this->user->getData($id);

        return $data;
    }




    public function registerUser(Request $request)
    {
        // // $validated = $request->validated();


        $data = $this->user->createDatas($request);


        return $data;



    }





    public function upDateUser(Request $request, $id)
    {

      
        $data = $this->user->updateData($request, $id);

        return $data;

    }




    public function removeUser(Request $request, $id)
    {

        // $data = User::find($id);

      
        $data = $this->user->deleteData($id);


        return $data;

    }





}
