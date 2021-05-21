<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Clothes
 *
 * @author vd180005d
 */
class Clothes extends BaseController{
   protected function prikazU(){
        echo view('Headernotsignedup');
        echo view('Clothes');
    }
    protected function prikazL(){
        echo view('Headersignedup');
        echo view('Clothes');
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
