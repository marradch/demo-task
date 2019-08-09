<?php

namespace Controllers;

use controllers\AbstractController;

class IndexController extends AbstractController {
	
	public static $name = 'index';
	
	public function index(){
		$this->render('wellcome', [
			'menuItem' => 'home'
		]);
	}
	
}


