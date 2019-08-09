<?php

namespace Helpers;

class UrlHelper {
	
	public static function parseUrl(){
		
		$params = [];
		$controller;
		$action;
		
		if($_SERVER['REQUEST_URI']!='/'){
			$uri_parts = explode('/', trim($_SERVER['REQUEST_URI'], ' /'));

			if (count($uri_parts) % 2) {
				throw new \Exception();
			}

			$controller = $uri_parts[0];
			$action = $uri_parts[1];
			
			for($i=2; $i<count($uri_parts); $i+=2){
				if(!in_array($uri_parts[$i], ['id', 'order', 'order-type', 'per-page', 'page'])){
					throw new \Exception();
				}
				$params[$uri_parts[$i]] = $uri_parts[$i+1];	
			}

			if(!empty($params['order-type']) && !in_array($params['order-type'], ['asc', 'desc'])){
				throw new \Exception();
			}

			if(!empty($params['order']) && !in_array($params['order'], ['name', 'email', 'status'])){
				throw new \Exception();
			}
		} else {
			$controller = 'index';
			$action = 'index';
		}				
		
		return [
			'controller' => $controller,
			'action' => $action,
			'params' => $params
		];

	}

	public static function pemovePage(){
		$params = [];
		$controller;
		$action;
		
		if($_SERVER['REQUEST_URI']!='/'){
			$uri_parts = explode('/', trim($_SERVER['REQUEST_URI'], ' /'));

			if (count($uri_parts) % 2) {
				throw new \Exception();
			}

			$controller = $uri_parts[0];
			$action = $uri_parts[1];
			
			for($i=2; $i<count($uri_parts); $i+=2){
				if(!in_array($uri_parts[$i], ['id', 'order', 'order-type', 'per-page', 'page'])){
					throw new \Exception();
				}
				$params[$uri_parts[$i]] = $uri_parts[$i+1];	
			}
			
			unset($params['page']);

			$paramsString = '';
			foreach($params as $key => $value){
				$paramsString .= '/'.$key.'/'.$value;
			}
			return '/'.$controller.'/'.$action.$paramsString;
		} else {
			return $_SERVER['REQUEST_URI'];
		}
	}
	
}

