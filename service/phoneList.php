<?php
error_reporting(E_ALL);
  ini_set("display_errors", 1);
	header('Content-type: application/json');
	include_once('class/PhoneList_class.php');
	$phoneList = new PhoneList();
	if(isset($_REQUEST['endpoint'])){
		$endpoint = $_REQUEST['endpoint'];
		$opts = object2Array( json_decode($_REQUEST['options']));
		
		//print_r($opts);
		
		$phoneList->makeCall($endpoint,$opts);
		echo json_encode($phoneList);
	}else{
		echo json_encode(array('status'=>'fail','error'=>'No endpoint'));
	}
	
	function object2Array($d)
	{
		if (is_object($d))
		{
			$d = get_object_vars($d);
		}
 
		if (is_array($d))
		{
			return array_map(__FUNCTION__, $d);
		}
		else
		{
			return $d;
		}
	}
?>