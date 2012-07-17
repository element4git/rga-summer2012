<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors','On');
	class InstagramPhotos{
		private $head;
		private $clientId = 'e5eedf9d080e4be08a051815337f89c9';
		private $secret = '1561bc6e677541f5a28efcbc16a0e67f';
		private $callBack = 'http://summer2012.web.rga.com';
		private $authURL;
		private $url;
		
		public function __construct(){
			
			$this->authURL = "https://api.instagram.com/oauth/authorize/?client_id=$this->clientId&redirect_uri=$this->callBack&response_type=code";
			$this->url = "https://api.instagram.com/v1/tags/rga/media/recent?client_id=$this->clientId";
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