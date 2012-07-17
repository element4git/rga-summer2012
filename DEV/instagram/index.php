
<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors','On');
	if(isset($_REQUEST['hub_challenge'])){
		echo $_REQUEST['hub_challenge'];
	}
	
	echo 'here';
?>