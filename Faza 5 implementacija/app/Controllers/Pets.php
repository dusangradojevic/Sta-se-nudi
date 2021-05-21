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
    protected function prikazL(){
        echo view('Headersignedup');
        echo view('Pets');
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
