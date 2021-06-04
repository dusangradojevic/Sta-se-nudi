<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\UserModel;

class User extends BaseController
{
    	protected function show($page,$data)
	{       
                $data['controller'] = 'User';
		$data['userId'] = $this->session->get('user')->idK;
                echo view('common/header-user', $data);
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-user');
	}
        
	public function index()
	{
		$this->show('home', []);
	}
        
        public function announcements() 
        {
                $this->show('announcements',[]);
        }
        
        public function search()
        {
                $adModel = new AdModel();
                $searched = $this->request->getVar('search-bar');
                
                $category = $this->request->getVar('search-category');
                $type = $this->request->getVar('search-type');
                $country = $this->request->getVar('search-country');
                $ads = $adModel->search($searched);   
                if ($category != 'Sve kategorije') 
                {
                    echo 'a';
                    $ads = $ads->like('category', $category);
                }
                if ($type != 'Svi tipovi') 
                {
                    echo 'a';
                    $ads = $ads->like('type', $type);
                }
                if ($country != 'Sve države') 
                {
                    echo 'a';
                    $ads = $ads->like('country', $country);
                }
                $this->show('search', ['ads'=>$ads, 'searched' => $searched]);
        }
        
        
        public function userProfile($userVisitId)
        {       
                $userModel = new UserModel();
                $profile = $userModel->find($userVisitId);
                $this->show('profile-user', ['userVisitId' => $userVisitId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $profile->rating, 'date' => $profile->date]);
        }
        
        public function support() 
        {
                $this->show('support', []);
        }
        
        public function supportForm()
        {
                $this->show('support-form', []);
        }
        
        
        
        public function logout()
        {
                $this->session->destroy();
                return redirect()->to(site_url(''));
        }
        
        
        
        public function showUserAds($userId) 
        {
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                $adModel = new AdModel();
                $ads = $adModel->getAds("idK", $userId);
                $this->show('ads-user', ['userId' => $userId, 'username' => $user->username, 'ads' => $ads]);
        }
        
        
        public function postAd()
        {
                $this->show('post-upload', []);
        }
        
        public function adSubmit() 
        {
                $date = date('Y-m-d');
                $adModel = new AdModel();
                
                $adModel->save([
                    'title'=>$this->request->getVar('name'),
                    'isValid'=>false,
                    'type'=>$this->request->getVar('tip'),
                    'state'=>$this->request->getVar('stanje'),
                    'text'=>$this->request->getVar('description'),
                    'category'=>$this->request->getVar('category'),
                    'date'=>$date,
                    'idK'=>$this->session->get('user')->idK,
                    'country'=>$this->session->get('user')->country,
                    'img0'=>$this->request->getVar('pic')
                ]);
                
                return redirect()->to(site_url('User'));  
        }
        
        public function showAnnouncements()
        {
                $annModel = new AnnouncementModel();
                $ann = $annModel->findAll();
                $this->show('announcements', ['announcements' => $ann]);
        }
        
        //Dohvata oglas po id-u
        public function getAd($idAd)   
        {       
                $adModel = new AdModel();
                $userModel = new UserModel();
                $ad = $adModel->find($idAd);
                /*$where = "idO='$idAd' AND isValid=1";
                $ad = $adModel->where($where)->first();*/
                $user = $userModel->where('idK', $ad->idK)->first();
                $this->show('ad', ['title' => $ad->title, 'country' => $ad->country ,'username' => $user->username, 'userId' => $user->idK, 
                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text, 'pic' => $ad->img0]);
        }
        
        public function changePassword() 
        {
                $this->show('password-change', []);
        }
        
        
        public function passwordChangeSubmit()
        {       
                $oldPass = $this->request->getVar('old-pass');
                $newPass = $this->request->getVar('new-pass');
                $newPassConf = $this->request->getVar('new-pass-conf');
                $oldPassDatabase = $this->session->get('user')->password;
                
                if($newPass != $newPassConf)
                {
                    return $this->show('password-change', ['poruka'=>"Polja za novu lozinku nisu identična"]);
                }
                
                if($oldPass != $oldPassDatabase)
                {
                    return $this->show('password-change', ['poruka'=>"Stara lozinka je pogrešna"]);
                }
                
                $userModel = new UserModel();                
                $userId = $userModel->find($this->session->get('user')->idK)->idK;
                
                $userModel->set('password', $newPass)->where('idK', $userId)->update();
                $this->session->get('user')->password = $newPass;
                
                return redirect()->to(site_url("User/userProfile/{$userId}"));
        }
        
        
        public function accountDelete()
        {       
                $adModel = new AdModel();
                $adModel->where('idK', $this->session->get('user')->idK)->delete();
                $userModel = new UserModel();               
                $userModel->where('idK', $this->session->get('user')->idK)->delete();
                
                $this->session->destroy();
                return redirect()->to(site_url("/"));
        }
}