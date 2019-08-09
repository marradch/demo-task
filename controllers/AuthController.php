<?php

namespace Controllers;

use controllers\AbstractController;
use Managers\UserManager;

class AuthController extends AbstractController {
	
	public static $name = 'auth';
	
	public function index(){
		$this->render('index', [
			'menuItem' => 'login'
		]);
	}
	
	public function authenticate(){
		
		$errors = [];		
		
		if(empty($_POST['name'])){
			$errors[] = 'Name is empty';
		}
		
		if(empty($_POST['password'])){
			$errors[] = 'Password is empty';
		}
		
		if(!count($errors)){							
			$user = UserManager::getByName($_POST['name']);
			if($user){
				if($user->password == md5($_POST['password'])){
					$_SESSION['user'] = $_POST['name'];
					header('Location: /');
				} else {
					$errors[] = 'Password wrong';
				}
			} else {
				$errors[] = 'User not found';
			}
		}
		
		$this->render('index', [
			'errors' => $errors,
			'menuItem' => 'login'
		]);
	}
	
	public function exit(){
		unset($_SESSION['user']);
		header('Location: /');
	}
	
}


