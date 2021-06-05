<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\ChatModel;
use App\Models\UserModel;

class Admin extends BaseController
{
        protected function show($page,$data)
	{       
                $data['controller'] = 'Admin';
		$data['sessionId'] = $this->session->get('user')->idK;
                echo view('common/header-user', $data);
                echo view('common/menu', $data);
                echo view("common/$page", $data);
                echo view('common/footer-admin');
	}
    
    
	public function index()
	{       
		$this->show('home', []);
	}
        
        
        public function pendingPosts()
        {
                $adModel = new AdModel();
                $ads = $adModel->getAds('isValid', false, true);
                
                $this->show('ads-user', ['userId' => 'admin', 'ads' => $ads]);
        }       
        
        public function approveAd($adId)
        {
                $adModel = new AdModel();
                $adModel->set('isValid', true)->where('idO', $adId)->update();
                
                //$this->show('ad', ['userId' => 'admin', 'ads' => $ads]);
                $this->getAd($adId);
        }
        
        
        
         public function logout()
        {
                $this->session->destroy();
                return redirect()->to(site_url(''));
        }
        
        public function userProfile($userVisitId)
        {       
                $userModel = new UserModel();
                $profile = $userModel->find($userVisitId);
                if ($this->session->get('user')->idK != $userVisitId)
                {
                    $this->show('profile-user', ['userVisitId' => $userVisitId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $profile->rating, 'date' => $profile->date]);
                }
                $this->show('profile-session-user', ['userVisitId' => $userVisitId, 'name' => $profile->name, 'surname' => $profile->surname ,'username' => $profile->username, 'country' => $profile->country, 
                                'num' => $profile->num, 'rating' => $profile->rating, 'date' => $profile->date]);
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
                
                return redirect()->to(site_url("Admin/userProfile/{$userId}"));
        }
        
        public function inbox()
        {       
                //lista korisnika sa kojima se dopisivao
                $chatModel = new ChatModel();
                $friends = $chatModel->getFriends($this->session->get('user')->idK);
                
                $this->show('inbox', ['friends' => $friends]);
        }
        
        public function sendMessage($userId)
        {       
                $userModel = new UserModel();
                $name = $userModel->find($userId)->name;
                $surname = $userModel->find($userId)->surname;
                $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
        }
        
        
        public function sendMessageSubmit($userId)
        {       
                $msg = $this->request->getVar('message-body');
                
                $userModel = new UserModel();
                $name = $userModel->find($userId)->name;
                $surname = $userModel->find($userId)->surname;
                
                if (empty($msg))
                {
                    $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
                }
                
                $chatModel = new ChatModel();
                
                $chatModel->save([
                    'user_to'=>$userId,
                    'user_from'=>$this->session->get('user')->idK,
                    'message'=>$msg,
                    //'datetime'=>date('Y-m-d'),
                ]);
                
                $this->show('send-message', ['userId' => $userId, 'name' => $name, 'surname' => $surname]);
        }
        
        
        public function chat($userId)
        {
            $chatModel = new ChatModel();
            $chat = $chatModel->getChat($this->session->get('user')->idK, $userId);
            $userModel = new UserModel();
            $user = $userModel->find($userId);
            $nameSession = $userModel->find($this->session->get('user')->idK)->name;
            $surnameSession = $userModel->find($this->session->get('user')->idK)->surname;
            $this->show('chat', ['chat' => $chat, 'userId' => $userId, 'name' => $user->name, 'surname' => $user->surname, 
                                'nameSession' => $nameSession, 'surnameSession' => $surnameSession]);
        }
        
        
        public function deleteAd($adId)
        {
                $adModel = new AdModel();
                $adModel->where('idO', $adId)->delete();
                
                return redirect()->to(site_url("Admin"));
        }
        
        public function postAnnouncement()
        {
                $this->show('post-announcement', []);
        }
        
        public function announcementSubmit()
        {
                $annModel = new AnnouncementModel();
                
                $annModel->save([
                    'title' => $this->request->getVar('name'),
                    'text' => $this->request->getVar('description'),
                    'idAd' => $this->session->get('user')->idK,
                    'date'=>date('Y-m-d')
                ]);
                
                
                return redirect()->to(site_url('Admin'));
        }
}
