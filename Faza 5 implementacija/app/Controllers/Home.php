<?php
/*
 * Dobrosav Vlaskovic 
 */
namespace App\Controllers;

class Home extends BaseController
{
    protected function prikazU(){
        echo view('Headernotsignedup');
        echo view('welcome_message');
    }

    public function index(){
        $this->prikazU();
    }
}
