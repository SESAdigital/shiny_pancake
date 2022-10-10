<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyTypeRequest;
use App\Http\Resources\PropertyTypeResource;
use App\Interface\PropertyTypeInterface;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{


    protected $propertyType;

    public function __construct(PropertyTypeInterface $propertyType)
    {
        $this->propertyType = $propertyType;
        
    }



    public function propertyTypes()
    {
        $data = $this->propertyType->getAllDatas();

        return $data;

    }




    public function propertyType($id)
    {
        $data = $this->propertyType->getData($id);

        return $data;

    }




    public function makePropertyType(PropertyTypeRequest $request)
    {


        // $this->authorize('manage-users');

        $validated = $request->validated();


        $data = $this->propertyType->createDatas($request);


        return $data;

    }





    public function upDatePropertyType(Request $request, $id)
    {

        $data = $this->propertyType->updateData($request, $id);

        return $data;
        
    }






    public function deletePropertyType($id)
    {

        $data = $this->propertyType->deleteData($id);


        return $data;

    }

}
