<?php

namespace App\Interface;

interface HouseHoldInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);



    // public function getFulfilledData();
}