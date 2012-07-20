<?php 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, 'https://api.instagram.com/v1/subscriptions/'); 
	
	
	$clientId = 'e5eedf9d080e4be08a051815337f89c9';
	$secret = '1561bc6e677541f5a28efcbc16a0e67f';
	$callBack = 'http://summer2012.web.rga.com/DEV/instagram/';
	
	$data = array('client_id' => $clientId,'client_secret'=>$secret,'object'=>'tag','aspect'=>'media','object_id'=>'summer2012test','callback_url'=>$callBack);
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch,  CURLOPT_POST, 1); 
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$head = curl_exec($ch); 
	curl_close($ch);
	
	print_r($head);

?>