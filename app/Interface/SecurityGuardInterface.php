<?php

namespace App\Interface;

interface SecurityGuardInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);
    public function deleteData($Id);

}