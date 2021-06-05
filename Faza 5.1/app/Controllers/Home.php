<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
                $data['controller']='Guest';
		echo view('common/header-guest');
                echo view('common/menu', $data);
                echo view('common/home', $data);
                echo view('common/footer-guest');
               // site_url("Guest/index");
	}
}
