<?php

namespace App\Interface;

interface EstateStaffInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);

}