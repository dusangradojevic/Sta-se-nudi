<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of PasswordForget
 *
 * @author vd180005d
 */
class PasswordForget extends BaseController {
    public  function index(){
        return view('Password-forget');
    }
}
