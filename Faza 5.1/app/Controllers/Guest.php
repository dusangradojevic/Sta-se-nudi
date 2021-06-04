<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\UserModel;

class Guest extends BaseController
{
	protected function show($page,$data)
	{
            
                $data['controller']='Guest';
		echo view('common/header-guest');
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-guest');
	}
        
        public function index()
	{       
		$this->show('home', []);
	}
        
        public function login($poruka=null)
	{
		$this->show('sign-in', ['poruka'=>$poruka]);
	}
        
        
        
        public function support() 
        {
                $this->show('sign-in', []);
        }
        
        
        public function registerSubmit()
	{
		if(!$this->validate(['name'=>'required', 'surname'=>'required', 'username' =>'required', 'email'=>'required', 'password'=>'required', 'confirmpassword'=>'required|matches[password]','country'=>'required','phone'=>'required',]))
                {
                    return $this->show('register', ['errors'=>$this->validator->getErrors()]);
                }    
                //$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
                
                $user=new UserModel();
                
                $date = date('Y-m-d');
                
                $user->save([
                    'username'=>$this->request->getVar('username'),
                    'isValid'=>false,
                    'name'=>$this->request->getVar('name'),
                    'mail'=>$this->request->getVar('email'),
                    'password'=>$this->request->getVar('password'),
                    'surname'=>$this->request->getVar('surname'),
                    'country'=>$this->request->getVar('country'),
                    'num'=>$this->request->getVar('phone'),
                    'rating'=>'0',
                    'date'=>$date
                ]);
                
                return redirect()->to(site_url('User'));   
	}
        
        
         public function register()
        {
                $this->show('register', []);
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
                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text]);
        }
        
        
        public function userProfile($userId)
        {
                $userModel = new UserModel();
                $profile = $userModel->find($userId);
                $this->show('profile-guest', ['userId' => $userId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $profile->rating, 'date' => $profile->date]);
        }
        
        
        public function sendMessage($userId)
        {
                $this->show('sign-in', ['userId' => $userId]);
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
        
        
        public function showUserAds($userId) 
        {
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                $adModel = new AdModel();
                $ads = $adModel->getAds("idK", $userId);
                $this->show('ads-user', ['userId' => $userId, 'username' => $user->username, 'ads' => $ads]);
        }
        
        public function showAnnouncements()
        {
                $annModel = new AnnouncementModel();
                $ann = $annModel->findAll();
                $this->show('announcements', ['announcements' => $ann]);
        }
        
        
        public function searchCategory($category)
        {
                $adModel = new AdModel();
                $ads = $adModel->getAds("category", $category);
                $this->show('search', ['ads' => $ads, 'searched' => $category]);
        }
        
        
        
        
        public function passwordForget()
        {
                $this->show('password-forget', []);
        }
        
        
        
        
        public function loginSubmit()
        {
                if(!$this->validate(['username'=>'required', 'password'=>'required']))
                {
                    return $this->show('sign-in', ['errors'=>$this->validator->getErrors()]);
                }
                
                $userModel=new UserModel();
                $user = $userModel->where("username",$this->request->getVar('username'))->first();
                
                if($user == null)
                {
                    return $this->login('Korisnik ne postoji');
                }
                
                if($user->password != $this->request->getVar('password'))   //Promenjeno u user->password umesto user->lozinka
                {
                    echo $this->request->getVar('password');
                    echo '------------------';
                    echo $user->password;
                    echo '------------------';
                    echo $this->request->getVar('password');
                    return $this->login('Pogresna lozinka');
                }
                $this->session->set('user', $user);
                return redirect()->to(site_url("User"));  
        }
}
