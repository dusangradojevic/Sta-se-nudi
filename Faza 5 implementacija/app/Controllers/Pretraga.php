<?php


namespace App\Controllers;


use App\Models\Entities\Oglasi;
use App\Models\Repositories\OglasiRepository;

class Pretraga extends BaseController{
    protected function prikazU($tekst){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->pretragadql($tekst);
        echo view('Headernotsignedup');
        echo view('Pretraga',['pets'=>$pets]);
    }
    protected function prikazL($tekst){
        $pets=$this->$this->doctrine->em->getRepository(OglasiRepository::class)
            ->pretragadql($tekst);
        echo view('Headersignedup');
        echo view('Pretraga',['pets'=>$pets]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL($this->request->getVar('pretraga'));
        else
            $this->prikazU($this->request->getVar('pretraga'));
    }
}