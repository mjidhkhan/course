<?php
require_once("includes/session.php"); 
require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
if(isset($_POST['action'])){
	if (logged_in()){
		$data = $_POST;
		$action = $_POST['action'];
		switch ($action) {
			case "ORDER":
				processOrderData($data);
				break;
		}
	}else{
		if(isset($_SESSION['ORDERS']) && sizeof($_SESSION['ORDERS'])>0){
			$_SESSION['ORDERS'] = 0;
		}
		
		 	$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'user_login.php';
			echo "Http://$host$uri/$extra";

	}
}else{
echo 'ERROR';
}

function processOrderData($data){

	
	
//array_push($_SESSION['ORDERS'],$data['id']);
	$_SESSION['ORDERS'][] = $data['id'];
	$result = sizeof($_SESSION['ORDERS']);
	
	echo $result;


	

	//unset($_SESSION['ORDERS'][$data['id']]);

}

