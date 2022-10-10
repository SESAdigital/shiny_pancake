<?php

namespace App\Http\Controllers\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Interface\PropertyInterface;
use App\Models\Property;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PropertyController extends Controller
{


    protected $property;

    public function __construct(PropertyInterface $property)
    {
        $this->property = $property;
        
    }


    
    public function properties()
    {
        $data = $this->property->getAllDatas();

        return $data;
    }




    public function property($id)
    {
        $data = $this->property->getData($id);

        return $data;
    }




    public function makeProperty(Request $request)
    {

        // $validated = $request->validated();


       
        $data = $this->property->createDatas($request);


        return $data;
        
    }





    public function upDateProperty(Request $request, $id)
    {

        $data = $this->property->updateData($request, $id);

        return $data;

    }






    public function deleteProperty($id)
    {

        $data = $this->property->deleteData($id);


        return $data;

    }


    public function search(Request $request)
    {

        // $q = $request->input('search');
        

        // $property = Property::query()->where('propertyCode', 'LIKE', "%{$q}")->get();
        
        // return response()->json([
        //     'property'=>$property,
        // ]);

        $data = $this->property->search($request);


        return $data;


    }

}
