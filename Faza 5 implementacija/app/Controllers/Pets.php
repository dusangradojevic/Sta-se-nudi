<?php
/*
 * Dobrosav Vlaskovic 
 */
namespace App\Controllers;

class Pets extends BaseController
{
	public function index()
	{
		return view('Pets');
	}
}
