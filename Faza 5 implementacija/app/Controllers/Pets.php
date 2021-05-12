<?php
/*
 * Dobrosav Vlaskovic 
 */
namespace App\Controllers;

class Pets extends BaseController
{
    protected function prikazU(){
        echo view('Headernotsignedup');
        echo view('Pets');
    }
    public function index(){
        $this->prikazU();
    }
}
