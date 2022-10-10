<?php

namespace App\Interface;

interface AdvertInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);
    // public function getOtp($req);
    // public function login($request);
    // public function logout($request);

    // public function info();



    // public function getFulfilledData();
}