<?php


namespace App\Controllers;

/**
 * Description of Tech
 
 * @author Dobrosav Vlaskovic
 */
class Tech extends BaseController{
    protected function prikazU() {
        echo view('Headernotsignedup');
        echo view('Tech');
    }
    public function index(){
        $this->prikazU();
    }
}
