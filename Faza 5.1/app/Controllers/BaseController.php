<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


use App\Models\AdModel;
use App\Models\AnnouncementModel;
use App\Models\UserModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

/**
 * Autori: Dobrosav Vlašković 2018/0005 i Lazar Gospavić 2018/0677 
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
            $this->session = session();
	}
        
        protected function show($page, $data) 
        {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        /**
         * Izlistavanje svih obaveštenja.
         * 
         * @return void
         */        
        public function showAnnouncements()
        {
                $annModel = new AnnouncementModel();
                $ann = $annModel->findAll();
                $this->show('announcements', ['announcements' => $ann]);
        }
        
        /**
         * Izlistava sve oglase koji pripadaju prosleđenoj kategoriji kao parametar
         * 
         * @param String $category
         * 
         * @return void
         */     
        public function searchCategory($category)
        {
                $adModel = new AdModel();
                $ads = $adModel->getAds("category", $category);
                
                $this->show('search', ['ads' => $ads, 'searched' => $category]);
        }
        
        /**
         * Izlistavanje svih oglasa zadatog korisnika.
         * 
         * @param int $userId
         * 
         * @return void
         */      
        public function showUserAds($userId) 
        {
                $userModel = new UserModel();
                $user = $userModel->find($userId);
                $adModel = new AdModel();
                $ads = $adModel->getAds("idK", $userId);
                $i = 0;
                foreach ($ads as $ad)
                {
                    if ($ad->isValid != 1)
                    {
                        unset($ads[$i]);
                    }
                    $i++;
                }
                $this->show('ads-user', ['userId' => $userId, 'username' => $user->username, 'ads' => $ads]);
        }
        
        
        /**
         * Dohvatanje oglasa po id-u
         * 
         * @param int $adId
         * 
         * @return void
         */     
        public function getAd($adId)   
        {
                if($this->session->get('user')==null)
                {
                    return redirect()->to(site_url("Guest")); 
                }
                $adModel = new AdModel();
                $userModel = new UserModel();
                $ad = $adModel->find($adId);
                if($ad == null)
                {
                    if($this->session->get('user')->idK == 1)
                    {
                        return redirect()->to(site_url("Admin")); 
                    }
                    return redirect()->to(site_url("Guest")); 
                }
                $user = $userModel->where('idK', $ad->idK)->first();
                $this->show('ad', ['adId' => $adId, 'title' => $ad->title, 'country' => $ad->country ,'username' => $user->username, 'userId' => $user->idK, 
                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text, 'img' => $ad->img,
                                'isValid' => $ad->isValid]);
        }
        
        /**
         * Funkcija za pretragu i filtriranje oglasa.
         * 
         * @return void
         */     
        public function search()
        {
                $adModel = new AdModel();
                $searched = $this->request->getVar('search-bar');
                
                $category = $this->request->getVar('search-category');
                $type = $this->request->getVar('search-type');
                $country = $this->request->getVar('search-country');
                $ads = $adModel->search($searched);   
                
                if ($category != 'Sve kategorije' || $type != 'Svi tipovi' || $country != 'Sve države')
                {
                    $i = 0;
                    foreach ($ads as $ad)
                    {
                        if ($category != 'Sve kategorije' && $ad->category != $category)
                        {
                            unset($ads[$i]);
                        }
                        elseif($type != 'Svi tipovi' && $ad->type != $type)
                        {
                            unset($ads[$i]);
                        }
                        elseif($country != 'Sve države' && $ad->country != $country)
                        {
                            unset($ads[$i]);
                        }
                        $i++;
                    }
                }
                
                $this->show('search', ['ads'=>$ads, 'searched' => $searched]);
        }
        
}
