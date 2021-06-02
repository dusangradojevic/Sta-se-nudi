<?php
/*
 * Dobrosav Vlaskovic 
 */
namespace App\Controllers;

use App\Models\Entities\Oglasi;

class Pets extends BaseController
{
    protected function prikazU(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Ljubimci'));
        echo view('Headernotsignedup');
        echo view('Pets',['pets'=>$pets]);
    }
    protected function prikazL(){
        $pets=$this->doctrine->em->getRepository(Oglasi::class)->findBy(array('isvalid' => true, 'category' => 'Ljubimci'));
        echo view('Headersignedup');
        echo view('Pets',['Pets'=>$pets]);
    }
    public function index(){
        if($this->session->get('korisnik')!=null)
            $this->prikazL();
        else
            $this->prikazU();
    }
}
