<?php


namespace App\Controllers;


use App\Models\Entities\Admin;
use App\Models\Entities\Korisnici;
use App\Models\Entities\Oglasi;

class Administrator extends BaseController{
    public function index(){
        return view('AdminSignin');
    }
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    public function loginSubmit() {
        $korisnik=$this->doctrine->em->getRepository(Admin::class)->findOneBy(array('username' => $this->request->getVar('username')));
        if($korisnik==null)
            return $this->login('Korisnik ne postoji');
        if($korisnik->getPassword()!=md5($this->request->getVar('pass')))
            return $this->login('Pogresna lozinka ili nije potvrdjen nalog');
        $this->session->set('Admin', $korisnik);
        return redirect()->to(site_url('Administrator/Potvrde'));
    }
    public function Potvrde(){
        if($this->session->get('Admin')!=null)
            $this->prikazK();
        else
            return 'Greska';
    }
    public function PotvrdaK($id){
        $korisnik=$this->doctrine->em->getRepository(Korisnici::class)->find($id);
        $korisnik->setIsValid(true);
        $this->doctrine->em->flush();
        return redirect()->to(site_url('Administrator/Potvrde'));
    }
    public function PotvrdaO($id){
        $oglasi=$this->doctrine->em->getRepository(Oglasi::class)->find($id);
        $oglasi->setIsValid(true);
        $this->doctrine->em->flush();
        return redirect()->to(site_url('Administrator/Potvrde'));
    }
    protected function prikazK(){
        $korisnici=$this->doctrine->em->getRepository(Korisnici::class)->findBy(array('isvalid' => false));
        //echo view('Headernotsignedup');
        $oglasi=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => false));
        echo view('Prikaz',['korisnici'=>$korisnici,'oglasi'=>$oglasi]);
    }
    protected function prikazO(){
        $oglasi=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => false));
       // echo view('Headersignedup');
        echo view('Prikaz',['oglasi'=>$oglasi]);
    }

}