<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of Announcements
 *
 * @author vd180005d
 */
class Announcements extends BaseController {
    //put your code here
    protected function prikaziU(){
        echo view('Headernotsignedup');
        echo view('Announcements');
    }
    public function index() {
        $this->prikaziU();
    }
}
