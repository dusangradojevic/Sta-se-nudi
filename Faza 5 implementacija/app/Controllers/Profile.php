<?php


namespace App\Controllers;
use App\Models\Entities\Korisnici;

/**
 * Description of Profile
 * Profile kontrolise sve mogucnosti profila
 * @author vd180005d
 */

class Profile extends BaseController
{
    public static $idk1;
    protected function prikaz($data) {
        $data['controller']='Korisnik';
        echo view ('profile', $data);
    }
    protected function login($poruka=null){
        $this->prikaz(['user'=>$poruka]);
    }
    public function index(){
        $korisnik=$this->session->get('korisnik');
        echo view('Headersignedup');
        $this->login($korisnik);

    }
    public function deleteRequest($id){
        if ($this->session->get('korisnik')!=null) {
            Profile::$idk1 = $id;
            echo view('Headersignedup');
            echo view('Acc-delete',['id'=>$id]);
        }
        else
            return "Greska";
    }
    public function delete($id){
        if ($this->session->get('korisnik')) {
            $this->session->destroy();
            $korisnik = $this->doctrine->em->getRepository(Korisnici::class)->find($id);
            $this->doctrine->em->remove($korisnik);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('/'));
        }
        else
            return "Greska";
    }
}