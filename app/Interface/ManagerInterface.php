<?php

namespace App\Interface;

interface ManagerInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);
    public function login();
    public function logout();
    public function personalInfo();
    public function search($request);



    // public function getFulfilledData();
}