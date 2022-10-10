<?php

namespace App\Interface;

interface InstallmentInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);



    // public function getFulfilledData();
}