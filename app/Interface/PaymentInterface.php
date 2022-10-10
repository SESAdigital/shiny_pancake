<?php

namespace App\Interface;

interface PaymentInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);
    public function getDate($Id);



    // public function getFulfilledData();
}