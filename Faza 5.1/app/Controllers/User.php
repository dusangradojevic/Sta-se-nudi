<?php

namespace App\Controllers;

use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\ChatModel;
use App\Models\UserModel;

class User extends BaseController
{
    	protected function show($page,$data)
	{       
                $data['controller'] = 'User';
		$data['sessionId'] = $this->session->get('user')->idK;
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
                    'datetime'=>date('Y-m-d'),
                ]);
                
                $this->show('home', []);
        }
        
        
        public function inbox()
        {       
                //lista korisnika sa kojima se dopisivao
                $chatModel = new ChatModel();
                $friends = $chatModel->getFriends($this->session->get('user')->idK);
                
                $this->show('inbox', ['friends' => $friends]);
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
        
        
        public function accountDelete()
        {       
                $adModel = new AdModel();
                $adModel->where('idK', $this->session->get('user')->idK)->delete();
                $userModel = new UserModel();               
                $userModel->where('idK', $this->session->get('user')->idK)->delete();
                
                $this->session->destroy();
                return redirect()->to(site_url("/"));
        }
        
        
        public function deleteAd($adId)
        {
                $adModel = new AdModel();
                $adModel->where('idO', $adId)->delete();
                
                return redirect()->to(site_url("User"));
        }
        
        public function adChange($adId) 
        {
                $adModel = new AdModel();
                $ad = $adModel->find($adId);
                $this->show('ad-change', ['adId' => $adId, 'title' => $ad->title, 'category' => $ad->category]);
        }
        
        
        public function adChangeSubmit($adId) 
        {
                $type = $this->request->getVar('tip');
                $state = $this->request->getVar('stanje');
                $text = $this->request->getVar('description');
                $img = $this->request->getVar('pic');
                
                if (empty($text)) 
                {
                    $text = "";
                }
                
                $adModel = new AdModel();
                $adModel->set('type', $type)->where('idO', $adId)->update();
                $adModel->set('state', $state)->where('idO', $adId)->update();
                $adModel->set('text', $text)->where('idO', $adId)->update();
                if (!empty($img)) $adModel->set('img', $img)->where('idO', $adId)->update();
                
                $this->getAd($adId);
        }
        
        
        
        
//        public function searchCategory($category)
//        {
//                $adModel = new AdModel();
//                $ads = $adModel->getAds("category", $category);
//                $this->show('search', ['ads' => $ads, 'searched' => $category]);
//        }
        
        
//        public function showAnnouncements()
//        {
//                $annModel = new AnnouncementModel();
//                $ann = $annModel->findAll();
//                $this->show('announcements', ['announcements' => $ann]);
//        }
        
        
        
        
//        //Dohvata oglas po id-u
//        public function getAd($idAd)   
//        {       
//                $adModel = new AdModel();
//                $userModel = new UserModel();
//                $ad = $adModel->find($idAd);
//                $user = $userModel->where('idK', $ad->idK)->first();
//                $this->show('ad', ['title' => $ad->title, 'country' => $ad->country ,'username' => $user->username, 'userId' => $user->idK, 
//                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text, 'pic' => $ad->img0]);
//        }
        
        
        
        
        
        
//        public function search()
//        {
//                $adModel = new AdModel();
//                $searched = $this->request->getVar('search-bar');
//                
//                $category = $this->request->getVar('search-category');
//                $type = $this->request->getVar('search-type');
//                $country = $this->request->getVar('search-country');
//                $ads = $adModel->search($searched);   
//                
//                if ($category != 'Sve kategorije' || $type != 'Svi tipovi' || $country != 'Sve države')
//                {
//                    $i = 0;
//                    foreach ($ads as $ad)
//                    {
//                        if ($category != 'Sve kategorije' && $ad->category != $category)
//                        {
//                            unset($ads[$i]);
//                        }
//                        elseif($type != 'Svi tipovi' && $ad->type != $type)
//                        {
//                            unset($ads[$i]);
//                        }
//                        elseif($country != 'Sve države' && $ad->country != $country)
//                        {
//                            unset($ads[$i]);
//                        }
//                        $i++;
//                    }
//                }
//                
//                $this->show('search', ['ads'=>$ads, 'searched' => $searched]);
//        }
        
}