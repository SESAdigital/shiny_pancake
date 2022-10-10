<?php

namespace App\Interface;

interface RFIDInterface
{
    public function getAllDatas();
    public function getData($id);
    public function createDatas($request);
    public function updateData($request, $id);
    public function deleteData($id);

}