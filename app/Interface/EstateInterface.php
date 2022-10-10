<?php

namespace App\Interface;

interface EstateInterface
{
    public function getAllDatas();
    public function getData($Id);
    public function deleteData($Id);
    public function createDatas($request);
    public function updateData($request, $Id);
    public function search($interface);
    public function attachSecurityGuard($request, $Id);
    public function attachSecurityComp($request, $Id);
    // public function login($request);
    // public function logout($request);

    // public function info();



    // public function getFulfilledData();
}