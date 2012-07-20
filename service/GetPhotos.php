<?php
	include_once('photoModerationClass.php');
	include_once('InstagramPhotosClass.php');
	
	
	
	
function storePhotos($urlPass = null){
		$md = new mongoDBcontrol('summer2012');
		$inst = new InstagramPhotos();

		$inst->getPhotos($urlPass);
		$head = json_decode($inst->head());
		
		$data = $head->data;
		
		for($i = 0; $i < sizeof($data); $i++){
			$exists = $md->findOne('photos',array('photo.id'=>$data[$i]->id));
			if(!$exists)
				$md->insert('photos',array('photo'=>array('id'=>$data[$i]->id, 'data'=>$data[$i])));
		}
		
		
		if(isset($_REQUEST['initDB']) && isset( $head->pagination->next_url ) && $head->pagination->next_url != ''){
			storePhotos($head->pagination->next_url);
			return false;
		}
		
		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode(array('status'=>'ok'));
}
function getPhotos(){
		$md = new mongoDBcontrol('summer2012');
		$results = $md->find('photos');
		$results = iterator_to_array($results);
		echo json_encode($results);
}
if(isset($_REQUEST['storePhotos']))
	storePhotos();
else
	getPhotos();
?>