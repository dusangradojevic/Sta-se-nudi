<?php


namespace App\Controllers;
/**
 * Description of Profile
 * @author vd180005d
 */

class Profile extends BaseController
{
    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ('profile', $data);
    }
    public function login($poruka=null){
        $this->prikaz(['user'=>$poruka]);
    }
    public function index(){
        $korisnik=$this->session->get('korisnik');
        echo view('Headersignedup');
        $this->login($korisnik);

    }
}