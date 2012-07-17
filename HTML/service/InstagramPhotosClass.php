<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors','On');
	class InstagramPhotos{
		private $head;
		private $clientId = '088d7ff62af44d89b47d59fc4dcb6c65';
		private $secret = '3b0a2e28a47e4c8ba889cc2771a24c34';
		private $callBack = 'http://summer2012.web.rga.com';
		private $authURL;
		private $url;
		
		public function __construct(){
			
			$this->authURL = "https://api.instagram.com/oauth/authorize/?client_id=$this->clientId&redirect_uri=$this->callBack&response_type=code";
			$this->url = "https://api.instagram.com/v1/tags/rgate/media/recent?client_id=$this->clientId";
		}
		public function getPhotos($url = null){
			if(isset($url)){
				$this->url = $url;
			}
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, $this->url); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true); 
			$this->head = curl_exec($ch); 
			curl_close($ch);
		}
		public function head(){
			return $this->head;
		}
	}
?>