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
        
        
        //Dohvata oglas po id-u
        public function getAd($adId)   
        {       
                $adModel = new AdModel();
                $userModel = new UserModel();
                $ad = $adModel->find($adId);
                $user = $userModel->where('idK', $ad->idK)->first();
                $this->show('ad', ['adId' => $adId, 'title' => $ad->title, 'country' => $ad->country ,'username' => $user->username, 'userId' => $user->idK, 
                                'category' => $ad->category, 'type' => $ad->type, 'state' => $ad->state, 'description' => $ad->text, 'pic' => $ad->img0,
                                'isValid' => $ad->isValid]);
        }
        
        
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
